<?php 
session_start();
require_once("includes/dbconnect.php");
$uname=htmlspecialchars(trim($_POST['txtUname']));
$pw=sha1(trim($_POST['txtPw']));
try {
    $sql="SELECT * FROM users WHERE userName=? && password=? && isActive=1 && isDeleted=0";
    $data=array($uname,$pw);
    $stmt=$con->prepare($sql);
    $stmt->execute($data);
    if($stmt->rowCount()==0){
        header("location:login.php?login=1");
    }else{
        $row=$stmt->fetch();
        $_SESSION['UID']=$row['userID'];
        $_SESSION['username']=$uname;
        header("location:users.php");
    }
} catch (PDOException $th) {
    echo $th->getMessage();;
}
?>