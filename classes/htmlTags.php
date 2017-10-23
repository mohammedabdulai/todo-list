<?php 
class htmlTags
{	
	static public function htmlOpen()
	{
		return '<!DOCTYPE html><html lang="en-US">';
	}
	static public function htmlClose()
	{
		return '</html>';
	}
	static public function headOpen()
	{
		return '<head>';
	}
	static public function headClose()
	{
		return '</head>';
	}
	static public function bodyOpen()
	{
		return '<body style="background: #fafafa;">';
	}
	static public function bodyClose()
	{
		return '</body>';
	}
	static public function h1($text)
	{
		return '<h1>'.$text.'</h1>';
	}
	static public function h2($text)
	{
		return '<h2>'.$text.'</h2>';
	}
	static public function blockquote($text)
	{
		return '<blockquote>'.$text.'</blockquote>';
	}
	static public function hr()
	{
		return '<hr>';
	}
	static public function fieldset($in, $legend = NULL)
	{
		if ($legend == NULL){
			$out = "<fieldset style='background: #fff;'>$in</fieldset>";
		}
		else{
			$out = "<fieldset style='background: #fff;'><legend>$legend</legend>$in</fieldset>";	
		}
		return $out;
	}
	static public function theadOpen()
	{
		return '<thead>';
	}
	static public function theadClose()
	{
		return '</thead>';
	}
	static public function th($input)
	{
		return "<th>$input</th>";
	}
	static public function td($input)
	{
		return "<td>$input</td>";
	}
	static public function trOpen()
	{
		return '<tr>';
	}
	static public function trClose()
	{
		return '</tr>';
	}
	static public function tableOpen()
	{
		return '<table class="CSVTable">';
	}
	static public function tableClose()
	{
		return '</table>';
	}
}
 ?>

