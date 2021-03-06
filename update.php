<?php
require 'database.php';

// Get the posted data.
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata)) {
  // Extract the data.
  $request = json_decode($postdata);

  // Validate.
  if ((int)$request->id ===null || trim($request->message) === '' || (float)$request->userId === null) {
    return http_response_code(400);
  }

  // Sanitize.
  $id    = mysqli_real_escape_string($con, (int)$request->id);
  $userId    = mysqli_real_escape_string($con, (int)$request->userId);
  $message = mysqli_real_escape_string($con, trim($request->message));

  // Update.
  $sql = "UPDATE `comments` SET `message`='$message',`userId`='$userId' WHERE `id` = '{$id}' LIMIT 1";

  if(mysqli_query($con, $sql)) {
    http_response_code(204);
  } else {
    return http_response_code(422);
  }
}
