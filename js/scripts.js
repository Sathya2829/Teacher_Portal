function showAddStudentModal() {
    document.getElementById('addStudentModal').style.display = 'block';
}
 
function showEditStudentModal(id, name, subject, marks) {
    document.getElementById('editStudentId').value = id;
    document.getElementById('editStudentName').value = name;
    document.getElementById('editStudentSubject').value = subject;
    document.getElementById('editStudentMarks').value = marks;
    document.getElementById('editStudentModal').style.display = 'block';
}
 
function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}
 
function showNotification(message, isSuccess) {
    const notification = document.createElement('div');
    notification.className = 'notification ' + (isSuccess ? 'success' : 'error');
    notification.innerText = message;
    document.body.appendChild(notification);
notification.style.display = 'block';
    setTimeout(() => {
notification.style.display = 'none';
        notification.remove();
    }, 5000); // Display notification for 5 seconds
}
 
function validateStudentForm(name, subject, marks) {
    if (name === '' || subject === '' || marks === '') {
        showNotification('All fields are required', false);
        return false;
    }
 
    if (isNaN(marks) || marks < 0) {
        showNotification('Marks must be a non-negative number', false);
        return false;
    }
 
    return true;
}
 
function addStudent() {
    const name = document.getElementById('studentName').value.trim();
    const subject = document.getElementById('studentSubject').value.trim();
    const marks = document.getElementById('studentMarks').value.trim();
 
    if (!validateStudentForm(name, subject, marks)) {
        return;
    }
 
    const formData = new FormData();
    formData.append('studentName', name);
    formData.append('studentSubject', subject);
    formData.append('studentMarks', marks);
 
    fetch('add_student.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        showNotification(data.message, data.success);
        if (data.success) {
            setTimeout(() => {
                location.reload();
            }, 1000); // Reload after 1 second
        }
    });
}
 
function editStudent() {
    const id = document.getElementById('editStudentId').value;
    const name = document.getElementById('editStudentName').value.trim();
    const subject = document.getElementById('editStudentSubject').value.trim();
    const marks = document.getElementById('editStudentMarks').value.trim();
 
    if (!validateStudentForm(name, subject, marks)) {
        return;
    }
 
    const formData = new FormData();
    formData.append('editStudentId', id);
    formData.append('editStudentName', name);
    formData.append('editStudentSubject', subject);
    formData.append('editStudentMarks', marks);
 
    fetch('edit_student.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        showNotification(data.message, data.success);
        if (data.success) {
            setTimeout(() => {
                location.reload();
            }, 1000); // Reload after 1 second
        }
    });
}
 
function deleteStudent(id) {
    if (!confirm('Are you sure you want to delete this student?')) {
        return;
    }
 
    fetch('delete_student.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `id=${id}`
    })
    .then(response => response.json())
    .then(data => {
        showNotification(data.message, data.success);
        if (data.success) {
            setTimeout(() => {
                location.reload();
            }, 1000); // Reload after 1 second
        }
    });
}