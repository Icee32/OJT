document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('adminForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        var formData = new FormData(this);

        fetch('api/process-form.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'ok') {
                    alert('User registered successfully');
                    document.getElementById('adminForm').reset(); // Reset form fields
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                alert('Error occurred. Please try again later.');
                console.error('Error:', error);
            });
    });
});