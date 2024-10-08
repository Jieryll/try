<?php
session_start();
include("connection.php");
require_once('fpdf/fpdf.php');
    
        // Initialize FPDF and create the PDF
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Laundry ni JEAN', 0, 1, 'L');
        $pdf->Ln(10);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, 'Order Number: ', 0, 1);

        // Retrieve items from the database
        $select = "SELECT * FROM items";
        $result = $conn->query($select);

        if ($result === false) {
            echo "Error: " . $conn->error;
            exit;
        } else {
            while ($row = $result->fetch_assoc()) {
                $pdf->Cell(0, 10, 'Item Name: ' . $row['namee'] . ', Price: ' . $row['price'], 0, 1);
            }
        }

        // Save PDF to a file
        $pdf_filename = 'temp/orderdetails.pdf';
        $pdf->Output($pdf_filename, 'F');  // Save the file on the server

        // Save the PDF file path in session for later access
        $_SESSION['pdf_file'] = $pdf_filename;
        
        if ($sumtotal > $amount) {
            $status = "Have Balance";
            $balance = $sumtotal - $amount;
            $change = 0;

            
            // Insert the order data into the orders table
            $stmt = $conn->prepare("INSERT INTO orders (transaction_id, total, payment, sukli, statuss, balance, datetimee) VALUES (?, ?, ?, ?, ?, ?, NOW())");
            if ($stmt && $stmt->bind_param("idddsd", $randomNumber, $sumtotal, $amount, $change, $status, $balance) && $stmt->execute()) {
                // Redirect to the page where the iframe will display the PDF
                header("Location: laundry.php");
                exit;
            } else {
                echo "Error in SQL statement preparation or execution.";
            }
        }
        break;
        

?>