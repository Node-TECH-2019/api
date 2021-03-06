<?php
require 'database.php';

// Get the posted data.
$postdata = file_get_contents("php://input");

echo '<script>';
echo 'console.log('. json_encode( $postdata ) .')';
echo '</script>';

if(isset($postdata) && !empty($postdata)) {
  // Extract the data.
  $request = json_decode($postdata);

  // Validate.
  if(trim($request->comment) === '' || (float)$request->user->uid === null) {
    return http_response_code(400);
  }

  // Sanitize.
  $message = mysqli_real_escape_string($con, trim($request->comment));
  $userId = mysqli_real_escape_string($con, (int)$request->user->uid);

  // Create.
  $sql = "INSERT INTO `comments`(`message`,`userId`) VALUES ('{$message}',{$userId})";


  if(mysqli_query($con,$sql)) {
    http_response_code(201);
    $policy = [
      'message' => $message,
      'userId' => $userId,
      'date' => date('Y/m/d H:i'),
      'id'    => mysqli_insert_id($con)
    ];
    echo json_encode($policy);
  }
  else
  {
    http_response_code(422);
  }
}
