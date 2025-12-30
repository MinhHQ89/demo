document.querySelectorAll('.delete-link').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        
        const id = this.getAttribute('data-id');
        if (!confirm('Are you sure you want to delete this user?')) return;
        
        const formData = new FormData();
        formData.append('id', id);
        
        fetch('delete.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('user-' + id).remove();
                
                const remainingUsers = document.querySelectorAll('[id^="user-"]');
                if (remainingUsers.length === 0) {
                    document.getElementById('users-list').innerHTML = 'No users found';
                }
                
                alert('User deleted successfully');
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            alert('Error: ' + error);
        });
    });
});

