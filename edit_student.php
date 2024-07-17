<?php
include 'includes/db.php';
 
$id = $_POST['editStudentId'];
$name = $_POST['editStudentName'];
$subject = $_POST['editStudentSubject'];
$marks = $_POST['editStudentMarks'];
 
$query = "UPDATE students SET name = ?, subject = ?, marks = ? WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('ssii', $name, $subject, $marks, $id);
 
if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Student updated successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error updating student']);
}
?>