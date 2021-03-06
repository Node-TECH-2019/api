<?php

//下記のコードでユーザー名、パスワード、データベース名を変更します。

Class Factory {

private static $local_db;

  public static function getConnection() {

    //for windows
    $servername = "mysql016.phy.heteml.lan";
    //for mac
    // $servername='127.0.0.1';

    // $username="root";
    // $password="qaz11181314";
    $username="_angular_async";
    $password="angular-async";

    $db="_angular_async";

    try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
    }
    catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
  }
}
?>
