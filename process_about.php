<?php 
require_once "includes/connect.php";

if(isset($_GET['delid'])){
    
$delSQL="DELETE FROM tblabout WHERE id=?";
$data=array($_GET['delid']);

try {
    $stmtDel=$con->prepare($delSQL);
    $stmtDel->execute($data);
    header('location:aboutus.php');
    
} catch (PDOException $th) {
    echo $th->getMessage();
}
}

if(isset($_GET['editid'])){
    $editSQL ="UPDATE tblabout SET aboutID= ?,atitle=?,acontent=? WHERE aboutId=?";
    $data=array($_GET['editid']);
try{
    $stmtEdit=$con->prepare($editSQL);
    $stmtEdit->execute($data);
    header('location:aboutus.php');

}catch(PDOException $th){
    echo $th->getMessage();
}

}



if(isset($_GET['txtTitle'])){

$title = $_GET['txtTitle'];
$content = $_GET['txtContent'];

try {
    $sql="INSERT INTO tblabout(atitle,acontent)VALUES(?,?)";
    $data=array($title,$content);
    $stmt=$con->prepare($sql);
    $stmt->execute($data);
    header('location:aboutus.php');
} catch (PDOException $th) {
    echo $th->getMessage();
}
}
?>