<?php
// Get the file to open name from previously set cookie.
$fileName = $_COOKIE["fileName"];
$numRow = 1;
$page = "<!DOCTYPE html><html lang = 'en-US'>
        <head>
            <meta charset = 'UTF-8'>
            <link rel='stylesheet' type='text/css' href='tableStyles.css'/>
        </head>
        <body style = 'background: #fafafa;'>\n";
$message ="<fieldset style='background:#FEFCFF'><legend><h2>File Information</h2></legend>";
$table = "<table class='CSVTable'><thead>\n\n";
if (($handle = fopen("uploads/$fileName", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $numCol = count($data);
        $table .="<tr>\n";
        for ($c=0; $c < $numCol; $c++) {
        	if($numRow == 1){
				$table .="<th>$data[$c]</th>\n";
        	}
        	else{
            	$table .="<td>$data[$c]</td>\n";
        	}
        }
        $table .="</tr></thead>\n";
        $numRow++;
    }
    fclose($handle);
    $table .="\n</table>";
}
/* Redirects back to file upload page if file cannot be opened 
   Exits php script after redirect to prevent any script from executing*/
else{
  header( "refresh:5;url=https://web.njit.edu/~ma678/project1/" );
  echo 'Unable to open file! You\'ll be redirected in about 5 secs. If not, click <a href="https://web.njit.edu/~ma678/project1/">here</a>.'; 
	exit;
}
// Build page message
$message .="File name: $fileName<br/>";
$message .="Number of records: ". ($numRow-3) . "<br/>";
$message .="Number of colums: ".$numCol."<br/>";
$message .="Total number of fields:". (($numRow-3) * $numCol)."<br/>";
$message .="</fieldset>";
// Build/organize and and print page. 
$page .=$message;
$page .=$table;
$page .="</body></html>";
print $page;

?> 

