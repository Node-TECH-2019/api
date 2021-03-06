<?php
/**
 * Returns the list of policies.
 */
require 'database.php';

$contents = [];
// $sql = "SELECT id, number, amount FROM policies";
$sql = "SELECT comments.id as id, comments.date as date, comments.message as message, comments.userId as userId, users.name as name, users.initial as initial FROM comments JOIN users ON comments.userId = users.id";

if($result = mysqli_query($con,$sql)) {
  $i = 0;
  while($row = mysqli_fetch_assoc($result)) {
    $contents[$i]['id']    = $row['id'];
    $contents[$i]['date'] = $row['date'];
    $contents[$i]['message'] = $row['message'];
    $contents[$i]['uid'] = $row['userId'];
    $contents[$i]['name'] = $row['name'];
    $contents[$i]['initial'] = $row['initial'];
    // $contents[$i]['user']['initial'] = $row['initial'];
    // $contents[$i]['user']['uid'] = $row['userId'];
    // $contents[$i]['user']['name'] = $row['name'];
    // $contents[$i]['initial'] = $row['initial'];
    // $contents[$i]['name'] = $row['name'];
    $i++;
  }

  echo json_encode($contents);
} else {
  http_response_code(404);
}
