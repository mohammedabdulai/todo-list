<?php 
class display extends page
{
	//returns the number of records(without table head) in a CSV file	
	public function rowCount()
	{
		$records = 0;
		$csvfile = file("./upload/".$_GET['filename']);//read entire file into array
		foreach($csvfile as $i =>$k){
			$records++;
		}
		return $records - 2;	
	}
	//returns the number of columns in a CSV file
	public function colCount()
	{
		$csvfile = fopen("./upload/" . $_GET['filename'],"r");//read entire file into array
		$data = fgetcsv($csvfile);
		$colCount = count($data);
		return $colCount;		
	}
	//Calculates the total number of fields in file not including column names
	public function totalFields()
	{
		$totalFields = $this->rowCount() * $this->colCount();
		return $totalFields;
	}
	//Loads CSV File into table
	public function get()
	{
		$rowNum = 1;
		//Generates statistics about CSV File and load file into table
		$fileInfo = "File name: ". $_GET['filename'] . "<br/>";
		$fileInfo .="Number of records: ". $this->rowCount() . "<br/>";
		$fileInfo .= "Number of columns: ". $this->colCount() . "<br/>";
		$fileInfo .= "Total Number of fields: ". $this->totalFields() . "<br/>";
		$fileInfo .="<b>Note:</b> The statistics above DO NOT include column names.";
		$legend = htmlTags::h1("File Information");
		$this->html .= htmlTags::fieldset($fileInfo, $legend);
		$this->html .= htmlTags::tableOpen();
		$this->html .= htmlTags::theadOpen();
		$csvfile = file("./upload/".$_GET['filename']);//read entire file into array
		foreach($csvfile as $i =>$k)
		{	
			$this->html .= htmlTags::trOpen();
			foreach(explode(",",$k) as $j)//convert csvfile into array
			{	
				if($rowNum == 1){	
					$this->html .= htmlTags::th($j);
				}
				else{
					$this->html .=htmlTags::td($j);
				}
			}
			$this->html .= htmlTags::trClose();
			if($rowNum == 1){$this->html .= htmlTags::theadClose();}
			$rowNum++;
		}
		$this->html .= htmlTags::tableClose();
	}
}
 ?>
