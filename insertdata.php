<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type_name = $_POST['type_name'];
    $kilo = $_POST['kilo'];

    // Prepare the select query for items
    $select = $conn->prepare("SELECT namee FROM items WHERE namee = ?");
    $select->bind_param("s", $type_name);
    $select->execute();
    $result1 = $select->get_result();

    if ($result1->num_rows < 1) {
        // If no record is found, insert new item
        $stmt = $conn->prepare("SELECT price FROM types WHERE type_name = ?");
        $stmt->bind_param("s", $type_name);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $price = $row['price'];
    
            $total = $price * $kilo;
    
            $sql = "INSERT INTO items (namee, kilo, price, total) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sddd", $type_name, $kilo, $price, $total);
     
            if ($stmt->execute()) {
                echo "Success! Data saved to the database.";
            } else {
                echo "Error: " . $stmt->error;
            }
    
            $stmt->close();
        } else {
            echo "No price found for this type.";
        }
    } else {
        // If record exists, update the item
        $stmt2 = $conn->prepare("SELECT kilo, price FROM items WHERE namee = ?");
        $stmt2->bind_param("s", $type_name);
        $stmt2->execute();
        $result2 = $stmt2->get_result();
        $row = $result2->fetch_assoc();

        $kilo1 = $kilo + $row['kilo']; // New kilo value
        $total1 = $kilo1 * $row['price']; // Calculate new total based on price

        // Now update the record
        $update_query = "UPDATE items SET kilo = ?, total = ? WHERE namee = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("dds", $kilo1, $total1, $type_name);

        if ($stmt === false) {
            die('Prepare failed: ' . $conn->error);
        }

        if (!$stmt->execute()) {
            die('Execute failed: ' . $stmt->error);
        }

        echo "Item updated successfully!";
        $stmt->close();
    }

    $conn->close();
}
?>
