<?php 
require_once("includes/dbconnect.php");
session_start();
if(!(isset($_SESSION['UID']))){
    header("location:login.php");
}

if(isset($_GET['delid'])){
    $delid=(int)$_GET['delid'];
    $sql="DELETE FROM users WHERE userID=?";
    $data=array($delid);
}else{
    $id=(int)$_POST['txtid'];
    $uname=htmlspecialchars(trim($_POST['txtuname']));
    $pw=sha1(trim($_POST['txtpw1']));
    $isActive=(int)$_POST['chkActive'];
    if($id==0){
        $sql="INSERT INTO users(userName,password,isActive)VALUES(?,?,?)";
        $data=array($uname,$pw,$isActive);
    }else{
        $sql="UPDATE users SET userName=?,password=?,isActive=? WHERE userID=?";
        $data=array($uname,$pw,$isActive,$id);
    }      
}
try {
    $stmt=$con->prepare($sql);
    $stmt->execute($data);
    header("location:users.php");
} catch (PDOException $th) {
    echo "ERROR : ".$th->getMessage();
}

?>