<?php 
class homepage extends page 
{
	public function get()
	{
		//header('refresh: 2; url=index.php?page=login');
		echo "<center><h1>Welcome!</h1></center>";
		$this->html .= htmlTags::div(htmlTags::blockquote("Get more done with WebBull!"));
	}
    
}
 ?>