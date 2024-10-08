<?php
include("connection.php");

$name = $_POST['name'];

$delete = "DELETE FROM items WHERE namee = ?";
$stmt = $conn->prepare($delete);
$stmt->bind_param('s', $name);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to delete item']);
}

$stmt->close();
$conn->close();
?>
