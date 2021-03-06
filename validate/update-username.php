<?php
//下記のコードは、Angularアプリケーションからユーザー名を取得し、そのユーザー名をdaoファイルに渡してデータベースと照合します

//make visible this api to all
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

//import dao file
require("../dao/validation-dao.php");

//catch the input value
$username=$_GET["username"];

//update username
$result=ValidationDao::update_username($username);

//send output
echo json_encode($result);

?>
