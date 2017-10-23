<?php 
abstract class page 
{
    protected $html;
    public function __construct()
    {
        $this->html .= htmlTags::htmlOpen();
        $this->html .= htmlTags::headOpen();
        $this->html .= '<link rel="stylesheet" href="tableStyles.css">';
        $this->html .= htmlTags::headClose();
        $this->html .= htmlTags::bodyOpen();
    }
    public function __destruct()
    {
    	$this->html .= htmlTags::bodyClose();
        $this->html .= htmlTags::htmlClose();
        stringFunctions::printThis($this->html);
    }	
}
?>