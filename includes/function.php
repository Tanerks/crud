<?php
function uploadFile($filename, $newbaseName)
{
    $upload_directory = $_SERVER['DOCUMENT_ROOT'] . "/SCHOOL/upload/users/";
    $res = "No file uploaded";

    if (is_uploaded_file($filename['tmp_name'])) {
        $originalName = $filename['name'];
        $extension = pathinfo($originalName, PATHINFO_EXTENSION);
        $newFileName = $newbaseName . "_" . pathinfo($originalName, PATHINFO_FILENAME) . "." . $extension;
        $uploadfile = $upload_directory . $newFileName;

        if (move_uploaded_file($filename['tmp_name'], $uploadfile)) {
            $res = "File was successfully uploaded as " . $newFileName;
            return $newFileName; // Return the new filename for database storage
        } else {
            $res = "Problem uploading file";
        }
    }
    return $res;
}
