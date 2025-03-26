<?php
require_once "includes/connect.php";

if (isset($_GET['delid'])) {

    $delSQL = "DELETE FROM sample WHERE id=?";
    $data = array($_GET['delid']);

    try {
        $stmtDel = $con->prepare($delSQL);
        $stmtDel->execute($data);
        header('location:aboutus.php');
    } catch (PDOException $th) {
        echo $th->getMessage();
    }
}

// if(isset($_GET['editid'])){
//     $editSQL ="UPDATE tblabout SET aboutID= ?,atitle=?,acontent=? WHERE aboutId=?";
//     $data=array($_GET['editid']);
// try{
//     $stmtEdit=$con->prepare($editSQL);
//     $stmtEdit->execute($data);
//     header('location:aboutus.php');

// }catch(PDOException $th){
//     echo $th->getMessage();
// }

// }



if (isset($_GET['txtTitle']) && isset($_GET['txtContent']) && isset($_GET['editid'])) {

    $title = $_GET['txtTitle'];
    $content = $_GET['txtContent'];
    $editid = $_GET['editid']; // Fixed case issue

    try {
        if ($editid == 0) { // Fixed comparison issue
            $sql = "INSERT INTO sample(name, content) VALUES(?, ?)";
            $data = array($title, $content);
        } else {
            $sql = "UPDATE sample SET name = ?, content = ? WHERE id = ?";
            $data = array($title, $content, $editid);
        }

        $stmt = $con->prepare($sql);
        $stmt->execute($data);

        header('location:aboutus.php');
        exit(); // Prevent further execution

    } catch (PDOException $th) {
        echo "Error: " . $th->getMessage();
    }
}
