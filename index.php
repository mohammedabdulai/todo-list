<?php

$page = "";
$page .="<!DOCTYPE html>
		<html lang='en-US'>
		<head></head>";
$page .="<h2>IS 601 PROJECT 1</h2>";
$page .="<blockquote>Name: Mohammed Abdulai<br/>Prof: Keith Willams</br>Fall 2017</blockquote>";
$page .= '
<body style="background: #fafafa;">
	<fieldset style="background: #fff;"><legend>This Program Accepts Only CSV Files</legend>
		<form action="upload.php" method="post" enctype="multipart/form-data">
		    Select file to upload:
		    <input type="file" name="fileToUpload" id="fileToUpload">
		    <input type="submit" value="Upload File" name="submit">
		</form>
	</fieldset>
</body>';

print $page;

?>
