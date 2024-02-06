<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- In your Laravel Blade view -->
    <button id="createPageButton">Create Page Template</button>
    <!-- In your Laravel Blade view -->
    <script>
        document.getElementById('createPageButton').addEventListener('click', function () {
            // Make an AJAX request to your Laravel controller method
            fetch('/create-page-template', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    // Include any necessary headers, such as X-CSRF-Token
                },
                credentials: 'same-origin', // Include credentials if necessary
                // Include any necessary data for creating the page template
                body: JSON.stringify({
                    title: 'New Page Template',
                    body_html: '<p>This is the content of the new page template.</p>',
                    // Add any additional parameters as needed
                }),
            })
                .then(response => response.json())
                .then(data => {
                    // Handle the response from the server, e.g., show a success message
                    console.log(data);
                    alert('Page template created successfully!');
                })
                .catch(error => {
                    // Handle errors, e.g., show an error message
                    console.error(error);
                    alert('Error creating page template. Please try again.');
                });
        });
    </script>

</body>

</html>