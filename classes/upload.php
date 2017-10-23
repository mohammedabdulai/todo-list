<?php 
class upload extends page
{
	public function get()
	{
		//adds information about program and loads form
        $form = htmlTags::h2("IS 601 PROJECT 1");
		$form .= htmlTags::blockquote("Name: Mohammed Abdulai<br/>Prof: Keith Willams</br>Fall 2017");
        $form .= 
        	htmlTags::fieldset(
				'<form action="index.php?page=upload" method="post" enctype="multipart/form-data">
			    	Select file to upload:
			    	<input type="file" name="file" id="file">
			    	<input type="submit" value="Upload File" name="submit" id="file">
				</form>', $legend="This Program Accepts Only CSV Files");
        $this->html .= $form;
	}
	public function post() 
	    {	
	        $target_dir = "upload/";
	        $target_file = $target_dir.$_FILES["file"]["name"];//make sure relative path of file
			$temp = explode(".",$_FILES["file"]["name"]); 
			$extension = end($temp);
			if(empty($_FILES['file']['error']))
			{
				if($extension != 'csv')
				{
					page::error('the format of file must be csv');
				}
	 	 		if (file_exists($target_file))   //Checking to confirm file is available
	        	{
	          		echo $_FILES["file"]["name"] . " the file has existed. ";
	        	}
	       		//Move file to the upload folder
	       		elseif (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file )==false) 
	       		{
	       			switch($_FILES["file"]["error"])
					{
						case 1:
							$this->html .= stringFunctions::printThis("The uploaded file exceeds the upload_max_filesize directive in php.ini");
							break;
						case 2:
							$this->html .= stringFunctions::printThis("The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.");
							break;
						case 3:
							 $this->html .= stringFunctions::printThis("The uploaded file was only partially uploaded");
							break;
						case 4:
							$this->html .= stringFunctions::printThis("No file was uploaded");
							break;
						case 6:
							$this->html .= stringFunctions::printThis("Missing a temporary folder. Introduced in PHP 5.0.3.");
							break;
						case 7:
							$this->html .= stringFunctions::printThis("Failed to write file to disk. Introduced in PHP 5.1.0.");
							break;
						default:
							$this->html .= stringFunctions::printThis("There are some mistake :".$_FILES["file"]["error"]."<br/>");
					} 	
	       		}
			   	else 
			   	{			
	 				header('Location:index.php?page=display&filename='. $_FILES["file"]["name"]);	
				}
			}
		}
}
?>
