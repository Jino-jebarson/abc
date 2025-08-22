<?php
// Set your API endpoint here
$api_url = "https://jinoportfolio.com/api/contact";  // Replace with your real API endpoint

// Collect POST data
$data = array(
    "name"    => $_POST['name'],
    "email"   => $_POST['email'],
    "subject" => $_POST['subject'],
    "message" => $_POST['message']
);

// Convert to JSON
$json_data = json_encode($data);

// Initialize cURL
$ch = curl_init($api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json"
));
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

// Execute request
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Return response to frontend
if ($httpcode == 200) {
    echo "Message submitted successfully!";
} else {
    echo "Failed to submit message. API returned status: " . $httpcode;
}
?>
