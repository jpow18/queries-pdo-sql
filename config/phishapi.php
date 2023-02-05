<?php

  $apiKey = '1D0A891F8076BD89B4BD';

  $apiEndpoint = 'https://api.phish.net/v5/shows' .
  '/artist/phish.json?order_by=showdate&apikey=' . $apiKey;
  
  // Request method
  $method = 'GET';

  // Initialize cURL session
  $curl = curl_init();

  // Set cURL options
  curl_setopt($curl, CURLOPT_URL, $apiEndpoint);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);

  // Add any necessary request headers
  $headers = array();
  $headers[] = "Content-Type: application/json";
  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

  // Make the API call
  $response = curl_exec($curl);

  // Check for errors
  if (curl_errno($curl)) {
    echo "cURL error: " . curl_error($curl);
  } else {
    // Parse the response
    $data = json_decode($response, true);

    //var_dump($data);
  }

  // Close the cURL session
  curl_close($curl);
?>