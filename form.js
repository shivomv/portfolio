document.getElementById('myForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent the default form submission

    // Your form validation code goes here, if needed

    // Perform an asynchronous POST request to the PHP script
    fetch('formdata.php', {
        method: 'POST',
        body: new FormData(document.getElementById('myForm')),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        // Check the success property in the response
        if (data.success) {
            // Display a success alert
            alert('WhatsApp message sent successfully!');
            // Redirect to the home page or perform any other actions
            window.location.href = '/index.html';  // Replace with your actual home page URL
        } else {
            // Display an error alert
            alert('Failed to send WhatsApp message. Please try again.');
            // You may redirect to an error page or handle the error in another way
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred. Please try again later.');
    });
});
