<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? null;
    $newKilo = $_POST['newKilo'] ?? null;

    if ($name && $newKilo) {
        // Prepare the update query
        $stmt = $conn->prepare("UPDATE items SET kilo = ?, total = price * ? WHERE namee = ?");
        $stmt->bind_param("dds", $newKilo, $newKilo, $name); // 'dds' means two doubles (floats) and one string

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Item updated successfully.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update item.']);
        }
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid data provided.']);
    }
}
?>
