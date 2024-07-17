<?php
include 'includes/header.php';
include 'includes/db.php';
include 'includes/functions.php';
 
$students = get_students($conn);
?>
 
<h1>Welcome to the Teacher Portal</h1>
<button onclick="showAddStudentModal()">Add New Student</button>
 
<table border="1">
    <tr>
        <th>Name</th>
        <th>Subject</th>
        <th>Marks</th>
        <th>Actions</th>
    </tr>
    <?php while ($student = $students->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $student['name']; ?></td>
        <td><?php echo $student['subject']; ?></td>
        <td><?php echo $student['marks']; ?></td>
        <td>
            <div class="dropdown">
                <button class="dropbtn">Actions</button>
                <div class="dropdown-content">
                    <a href="#" onclick="showEditStudentModal(<?php echo $student['id']; ?>, '<?php echo $student['name']; ?>', '<?php echo $student['subject']; ?>', <?php echo $student['marks']; ?>)">Edit</a>
                    <a href="#" onclick="deleteStudent(<?php echo $student['id']; ?>)">Delete</a>
                </div>
            </div>
        </td>
    </tr>
    <?php } ?>
</table>
 
<div id="addStudentModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('addStudentModal')">&times;</span>
        <form id="addStudentForm">
            <label for="studentName">Name:</label>
            <input type="text" id="studentName" name="studentName" required><br>
            <label for="studentSubject">Subject:</label>
            <input type="text" id="studentSubject" name="studentSubject" required><br>
            <label for="studentMarks">Marks:</label>
            <input type="number" id="studentMarks" name="studentMarks" required><br>
            <button type="button" onclick="addStudent()">Add Student</button>
        </form>
    </div>
</div>
 
<div id="editStudentModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('editStudentModal')">&times;</span>
        <form id="editStudentForm">
            <input type="hidden" id="editStudentId" name="editStudentId">
            <label for="editStudentName">Name:</label>
            <input type="text" id="editStudentName" name="editStudentName" required><br>
            <label for="editStudentSubject">Subject:</label>
            <input type="text" id="editStudentSubject" name="editStudentSubject" required><br>
            <label for="editStudentMarks">Marks:</label>
            <input type="number" id="editStudentMarks" name="editStudentMarks" required><br>
            <button type="button" onclick="editStudent()">Save Changes</button>
        </form>
    </div>
</div>
 
<?php include 'includes/footer.php'; ?>