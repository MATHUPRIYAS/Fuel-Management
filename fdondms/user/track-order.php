<?php
// Function to get the user's IP address
function get_client_ip() {
    $ip = $_SERVER['REMOTE_ADDR'];
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    return $ip;
}

// Get the user's IP address
$user_ip = get_client_ip();

// Create the API URL
$api_url = "http://ip-api.com/json/{$user_ip}";

// Send a GET request to the API
$response = file_get_contents($api_url);

// Parse the JSON response
$data = json_decode($response);

// Check if the API request was successful
if ($data && $data->status === 'success') {
    $latitude = $data->lat;
    $longitude = $data->lon;
    $city = $data->city;
    $country = $data->country;
    $region = $data->regionName;

    echo "IP Address: {$user_ip}<br>";
    echo "City: {$city}<br>";
    echo "Region: {$region}<br>";
    echo "Country: {$country}<br>";
    echo "Latitude: {$latitude}<br>";
    echo "Longitude: {$longitude}<br>";
} else {
    echo "Unable to retrieve location information.";
}
?>
