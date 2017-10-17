
<?php
$page = "";
$message = "";
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
/*if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ". ";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 1;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}*/
// Check file size
if ($_FILES["fileToUpload"]["size"] > 1000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "csv" && $imageFileType != "CSV") {
    echo "Sorry, only CSV files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
// Set cookie with file name
// Redirect to file content page where file gets loaded into a table.
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $fileName = basename( $_FILES["fileToUpload"]["name"]);
        setcookie("fileName", $fileName);
        header("refresh:5; url=https://web.njit.edu/~ma678/project1/fileContent.php");
        echo "<h3>SUCCESS!</h3>";
        echo "The file $fileName has been uploaded.<br><b>File Content is loading...</b><br><i>If it doesn't load in 5 seconds, click <a href='https://web.njit.edu/~ma678/project1/fileContect.php'>here</a>.</i>";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
