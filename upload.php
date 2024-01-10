<?php
include('session.php');





$error = array();
$extension = array("jpeg", "jpg", "png", "gif");
foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
    $file_name = $_FILES["files"]["name"][$key];
    $file_tmp = $_FILES["files"]["tmp_name"][$key];
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);

    if (in_array($ext, $extension)) {
        if (!file_exists("images/"  . $file_name)) {
            move_uploaded_file($file_tmp = $_FILES["files"]["tmp_name"][$key], "images/"   . $file_name);
            $sql = "INSERT INTO `upload`( `upload_name`) VALUES ('images/$file_name')";
            if ($db->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $db->error;
            }
            $result = mysqli_query($db, $sql);
        } else {
            $filename = basename($file_name, $ext);
            $newFileName = $filename . time() . "." . $ext;
            move_uploaded_file($file_tmp = $_FILES["files"]["tmp_name"][$key], "images/"  . $newFileName);
            $sql = "INSERT INTO `upload`( `upload_name`) VALUES ('images/$file_name')";
            if ($db->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $db->error;
            }
        }
    } else {
        array_push($error, "$file_name, ");
    }
}
