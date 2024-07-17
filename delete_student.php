<?php
include 'includes/db.php';
 
$id = $_POST['id'];
 
$query = "DELETE FROM students WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
 
if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Student deleted successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error deleting student']);
}
?>