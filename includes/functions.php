<?php
function check_login($conn, $username, $password) {
    $sql = "SELECT * FROM teachers WHERE username = ? AND password = PASSWORD(?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->num_rows > 0;
}

function get_students($conn) {
    $sql = "SELECT * FROM students";
    return $conn->query($sql);
}

function add_or_update_student($conn, $name, $subject, $marks) {
    $sql = "SELECT * FROM students WHERE name = ? AND subject = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $subject);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $new_marks = $row['marks'] + $marks;
        $sql = "UPDATE students SET marks = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $new_marks, $row['id']);
    } else {
        $sql = "INSERT INTO students (name, subject, marks) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $name, $subject, $marks);
    }

    return $stmt->execute();
}

function delete_student($conn, $id) {
    $sql = "DELETE FROM students WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
?>