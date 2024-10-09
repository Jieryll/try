<?php
session_start();
include("connection.php");
require_once('fpdf/fpdf.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = isset($_POST['amount']) ? (float)$_POST['amount'] : 0;
    $sumtotal = isset($_POST['sumtotal']) ? (float)$_POST['sumtotal'] : 0;
    $trans_id = isset($_POST['trans_id']) ? $_POST['trans_id'] : '';  
    $payment_button = isset($_POST['payment']) ? $_POST['payment'] : '';

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Laundry ni JEAN', 0, 1, 'L');
    $pdf->Ln(10);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'Order Number: ' . $trans_id, 0, 1);

    if (!empty($payment_button)) {

        if ($sumtotal > $amount) {
            $status = "Have Balance";
            $balance = $sumtotal - $amount;
            $change = 0;
            $select = "SELECT * FROM items";
            $result = $conn->query($select);

            if ($result === false) {
                echo "<script>alert('Error fetching items from database: " . $conn->error . "');</script>";
                exit;
            } else {
                while ($row = $result->fetch_assoc()) {
                    $pdf->Cell(0, 10, 'Item Name: ' . $row['namee'] . ', Price: ' . $row['price'], 0, 1);
                }
            }

            $stmt = $conn->prepare("INSERT INTO orders (transaction_id, total, payment, sukli, statuss, balance, datetimee) VALUES (?, ?, ?, ?, ?, ?, NOW())");

            if ($stmt) {
                $stmt->bind_param("sdddsd", $trans_id, $sumtotal, $amount, $change, $status, $balance);

                if ($stmt->execute()) {
                    $pdf_filename = 'temp/orderdetails' . $trans_id . '.pdf';
                    $pdf->Output($pdf_filename, 'F');  
                    $_SESSION['pdf_file']=$pdf_filename;
                    header('Content-Type: application/pdf');
                    header('Content-Disposition: attachment; filename="orderdetails' . $trans_id . '.pdf"');
                    header('Content-Length: ' . filesize($pdf_filename));
                    readfile($pdf_filename);
                    header("Location: laundry.php"); 
                    exit;
                } else {
                    echo "<script>alert('SQL Execution Error: " . $stmt->error . "');</script>";
                }
            } else {
                echo "<script>alert('SQL Preparation Error: " . $conn->error . "');</script>";
            }
        } else {
            echo "<script>alert('Amount paid is less than the total.');</script>";
        }
    }
}
?>
