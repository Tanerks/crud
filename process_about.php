<?php
require_once "includes/connect.php";
require_once "includes/function.php";

if (isset($_GET['delid'])) {
    $delSQL = "DELETE FROM tblabout WHERE md5(id) = ?";
    $data = array($_GET['delid']);

    try {
        $stmtDel = $con->prepare($delSQL);
        $stmtDel->execute($data);
        header('location:aboutus.php');
        exit;
    } catch (PDOException $th) {
        echo "Error: " . $th->getMessage();
    }
}


if (isset($_POST['editid'])) {
    $myTitle = $_POST['txtTitle'];
    $myContent = $_POST['txtContent'];
    $editID = $_POST['editnewsid']; // Corrected variable name

    try {
        if (empty($editID) || $editID == '0') {
            // Insert new record
            $sql = "INSERT INTO tblabout(atitle, acontent) VALUES (?, ?)";
            $data = array($myTitle, $myContent);
        } else {
            // Update existing record
            $sql = "UPDATE tblabout SET atitle = ?, acontent = ? WHERE md5(id) = ?";
            $data = array($myTitle, $myContent, $editID);
        }

        $stmt = $con->prepare($sql);
        $stmt->execute($data);
        header("Location: aboutus.php");
        exit;
    } catch (Throwable $th) {
        echo "error: " . $th->getMessage();
    }
} else {
    echo "No editid present for form submission.";
}


if (isset($_GET['delnewsid'])) {
    $delSQL = "DELETE FROM news WHERE md5(id) = ?";
    $data = array($_GET['delnewsid']);

    try {
        $stmtDel = $con->prepare($delSQL);
        $stmtDel->execute($data);
        header('location:news.php');
        exit;
    } catch (PDOException $th) {
        echo "Error: " . $th->getMessage();
    }
}

if (isset($_POST['editnewsid'])) {
    $myTitle = $_POST['txtTitle'];
    $myAuthor = $_POST['txtAuthor'];
    $myDateposted = $_POST['txtDateposted'];
    $myStory = $_POST['txtStory'];
    $myPicture = $_FILES['picture'];
    $editID = $_POST['editnewsid']; // Correct variable name

    try {
        if (empty($editID) || $editID == '0') {
            // Insert new record (initially without image)
            $sql = "INSERT INTO news(title, author, dateposted, story) VALUES (?, ?, ?, ?)";
            $data = array($myTitle, $myAuthor, $myDateposted, $myStory);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);

            // Get last inserted ID
            $lastid = $con->lastInsertId();

            // Upload the image using original name + lastid as new filename
            if ($myPicture && $myPicture['error'] === 0) {
                $originalName = pathinfo($myPicture['name'], PATHINFO_FILENAME);
                $extension = pathinfo($myPicture['name'], PATHINFO_EXTENSION);
                $newBaseName = $originalName . "_" . $lastid;
                $uploadResult = uploadFile($myPicture, $newBaseName);
                echo "Upload Result: " . $uploadResult;

                // Optionally, update the news record with the image filename if you have a 'picture' column
                if ($uploadResult !== "No file uploaded" && strpos($uploadResult, "Problem uploading file") === false) {
                    $picname = $newBaseName . "." . $extension;
                    $sqlUpdate = "UPDATE news SET picture = ? WHERE id = ?";
                    $stmtUpdate = $con->prepare($sqlUpdate);
                    $stmtUpdate->execute([$picname, $lastid]);
                }
            }
        } else {
            // Update existing record
            $sql = "UPDATE news SET title = ?, author = ?, dateposted = ?, story = ? WHERE md5(id) = ?";
            $data = array($myTitle, $myAuthor, $myDateposted, $myStory, $editID);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);

            // If picture is uploaded during update
            if ($myPicture && $myPicture['error'] === 0) {
                $originalName = pathinfo($myPicture['name'], PATHINFO_FILENAME);
                $extension = pathinfo($myPicture['name'], PATHINFO_EXTENSION);
                $newBaseName = $originalName . "_" . $editID;
                $uploadResult = uploadFile($myPicture, $newBaseName);
                echo "Upload Result: " . $uploadResult;

                // Optionally, update the news record with the image filename if you have a 'picture' column
                if ($uploadResult !== "No file uploaded" && strpos($uploadResult, "Problem uploading file") === false) {
                    $picname = $newBaseName . "." . $extension;
                    $sqlUpdate = "UPDATE news SET picture = ? WHERE md5(id) = ?";
                    $stmtUpdate = $con->prepare($sqlUpdate);
                    $stmtUpdate->execute([$picname, $editID]);
                }
            }
        }

        header("Location: news.php");
        exit;
    } catch (Throwable $th) {
        echo "error: " . $th->getMessage();
    }
} else {
    echo "No editnewsid present for form submission.";
}
