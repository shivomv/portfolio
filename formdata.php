<?php
// Function for sending WhatsApp messages using cURL
function send_whatsapp_curl($name, $email, $message, $website, $landingpage, $ecommerce, $websolution) {
    $phone = "+916391603103";  // Replace with your actual phone number
    $apiKey = "7543664";  // Replace with your actual API key

    // Customize the message using form data
    $whatsapp_message = "New Form Submission:\nName: $name\nEmail: $email\nMessage: $message\n";
    $whatsapp_message .= "Website: " . ($website ? 'Yes' : 'No') . "\n";
    $whatsapp_message .= "Landing Page: " . ($landingpage ? 'Yes' : 'No') . "\n";
    $whatsapp_message .= "Ecommerce: " . ($ecommerce ? 'Yes' : 'No') . "\n";
    $whatsapp_message .= "Web Solutions: " . ($websolution ? 'Yes' : 'No');

    $url = 'https://api.callmebot.com/whatsapp.php?source=php&phone=' . $phone . '&text=' . urlencode($whatsapp_message) . '&apikey=' . $apiKey;

    if ($ch = curl_init($url)) {
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $html = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // Check if the message was sent successfully
        if ($status === 200) {
            // Return a success response
            return json_encode(['success' => true]);
        }
    }

    // Return an error response if there was an issue
    return json_encode(['success' => false]);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $website = isset($_POST['website']) ? 1 : 0;
    $landingpage = isset($_POST['landingpage']) ? 1 : 0;
    $ecommerce = isset($_POST['ecommerce']) ? 1 : 0;
    $websolution = isset($_POST['websolution']) ? 1 : 0;

    // Call the function with form data
    $response = send_whatsapp_curl($name, $email, $message, $website, $landingpage, $ecommerce, $websolution);

    // Output the response as JSON
    header('Content-Type: application/json');
    echo $response;
    exit();
}
?>
