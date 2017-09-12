<?php
$target_dir = "Pictures/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$error = 0;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
	$uploadOk = 0;
	$error = 1;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $uploadOk = 0;
    $error = 2;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	if ($error == 1) {
		echo 3;
	} else if ($error == 2) {
		echo 0;
	}
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo 1;
    } else {
        echo 2;
    }
}
?>