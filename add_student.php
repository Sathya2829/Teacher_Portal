<?php
include 'includes/db.php';
 
$name = $_POST['studentName'];
$subject = $_POST['studentSubject'];
$marks = $_POST['studentMarks'];
 
// Check if student with the same name and subject combination already exists
$query = "SELECT * FROM students WHERE name = ? AND subject = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('ss', $name, $subject);
$stmt->execute();
$result = $stmt->get_result();
 
if ($result->num_rows > 0) {
    // Update marks
    $student = $result->fetch_assoc();
    $newMarks = $student['marks'] + $marks;
 
    $updateQuery = "UPDATE students SET marks = ? WHERE id = ?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param('ii', $newMarks, $student['id']);
    if ($updateStmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Student marks updated successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error updating student marks']);
    }
} else {
    // Insert new student
    $insertQuery = "INSERT INTO students (name, subject, marks) VALUES (?, ?, ?)";
    $insertStmt = $conn->prepare($insertQuery);
    $insertStmt->bind_param('ssi', $name, $subject, $marks);
    if ($insertStmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Student added successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error adding student']);
    }
}
?>