<?php
include('session.php');





$error = array();
$extension = array("jpeg", "jpg", "png", "gif");
$message = $_POST['message'] ?? "";
$message =  $db -> real_escape_string($message);
foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
    $file_name = $_FILES["files"]["name"][$key];
    $file_tmp = $_FILES["files"]["tmp_name"][$key];
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);

    if (in_array($ext, $extension)) {
        if (!file_exists("images/"  . $file_name)) {
            move_uploaded_file($file_tmp = $_FILES["files"]["tmp_name"][$key], "images/"   . $file_name);
            $sql = "INSERT INTO `upload`( `upload_name`, message) VALUES ('images/$file_name','$message')";
            if ($db->query($sql) === TRUE) {
                echo "<script>
                alert('New photo uploaded successfully');
                </script>";
            } else {
                echo "Error: " . $sql . "<br>" . $db->error;
            }
            $result = mysqli_query($db, $sql);
        } else {
            $filename = basename($file_name, $ext);
            $newFileName = $filename . time() . "." . $ext;
            move_uploaded_file($file_tmp = $_FILES["files"]["tmp_name"][$key], "images/"  . $newFileName);
            $sql = "update `upload` set  `upload_name` = 'images/$file_name' where upload_name='images/$file_name'";
            if ($db->query($sql) === TRUE) {
                echo "<script>
                alert('New photo updated successfully');
                </script>";
            } else {
                echo "Error: " . $sql . "<br>" . $db->error;
            }
        }
    } else {
        array_push($error, "$file_name, ");
    }
}
