<?php
include('session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload your images</title>
    <!-- Argon CSS -->
    <link type="text/css" href="assets/css/argon.css" rel="stylesheet" />
    <link type="text/css" href="assets/css/custom.css" rel="stylesheet" />
    link
</head>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <table width="100%">
        <tr>
            <td>Select Photo (one or multiple):</td>
            <td><input type="file" name="files[]" multiple /></td>
        </tr>
        <tr>
            <td colspan="2" align="center">Note: Supported image format: .jpeg, .jpg, .png, .gif</td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" value="Create Gallery" id="selectedButton" /></td>
        </tr>
    </table>
</form>

<body>

</body>

</html>