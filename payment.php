<?php
session_start();
include("connection.php");
require_once('fpdf/fpdf.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch POST data and ensure proper types
    $amount = isset($_POST['amount']) ? (float)$_POST['amount'] : 0;
    $sumtotal = isset($_POST['sumtotal']) ? (float)$_POST['sumtotal'] : 0;
    $trans_id = isset($_POST['trans_id']) ? $_POST['trans_id'] : '';  // Assuming transaction_id is a string
    $payment_button = isset($_POST['payment_btn']) ? $_POST['payment_btn'] : '';

    // Initialize FPDF and create the PDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Laundry ni JEAN', 0, 1, 'L');
    $pdf->Ln(10);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'Order Number: ' . $trans_id, 0, 1);

    // Check if payment button is clicked (fix case logic)
    if (!empty($payment_button)) {
        // Validate the amount and sum total
        if ($sumtotal > $amount) {
            $status = "Have Balance";
            $balance = $sumtotal - $amount;
            $change = 0;

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
            $pdf_filename = 'temp/orderdetails' . $trans_id . '.pdf';
            $pdf->Output($pdf_filename, 'F');  // Save the file on the server

            // Prepare SQL statement for inserting into the orders table
            $stmt = $conn->prepare("INSERT INTO orders (transaction_id, total, payment, sukli, statuss, balance, datetimee) VALUES (?, ?, ?, ?, ?, ?, NOW())");

            if ($stmt) {
                // Bind parameters (assuming transaction_id is a string)
                $stmt->bind_param("sdddsd", $trans_id, $sumtotal, $amount, $change, $status, $balance);

                // Execute the statement
                if ($stmt->execute()) {
                    // Force the file to be downloaded by the client
                    header('Content-Type: application/pdf');
                    header('Content-Disposition: attachment; filename="orderdetails' . $trans_id . '.pdf"');
                    header('Content-Length: ' . filesize($pdf_filename));
                    readfile($pdf_filename);

                    // Redirect after download
                    header("Location: laundry.php");
                    exit;
                } else {
                    // Output any SQL errors during execution
                    echo "SQL Execution Error: " . $stmt->error;
                }
            } else {
                // Output any errors during statement preparation
                echo "SQL Preparation Error: " . $conn->error;
            }
        } else {
            echo "Amount paid is less than the total.";
        }
    }
}
?>

