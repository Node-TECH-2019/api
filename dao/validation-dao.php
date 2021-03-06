<?php
//ここに、ユーザー名のチェック機能があります。この関数は、ユーザー名を入力として受け取り、ユーザー名がデータベースに存在するかどうかをチェックします。ユーザー名が存在する場合は、trueを返すか、falseを返します。

require("../config/dbconn.php");

class ValidationDao {
  public static function check_username($username) {
    $data=false;
    try {
      $db = Factory::getConnection();
      $statement = $db->prepare("SELECT username from users
        where username=:username");

      $statement->execute(array(':username'=>$username));

      $result=$statement->fetchAll(PDO::FETCH_ASSOC);

      if(count($result)>0) {
        $data=true;
      }

      $statement=null;
    }
    catch (PDOException $e) {
      print $e->getMessage();
    }
    return $data;
  }
  public static function update_username($username) {
    $data=false;
    try {
      $db = Factory::getConnection();
      $statement = $db->prepare("UPDATE users SET username=:username where username='raja'");

      $statement->execute(array(':username'=>$username));

      $result=$statement->fetchAll(PDO::FETCH_ASSOC);

      if(count($result)>0) {
        $data=true;
      }

      $statement=null;
    }
    catch (PDOException $e) {
      print $e->getMessage();
    }
    return $data;
  }
}
?>
