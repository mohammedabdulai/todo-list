<?php
use utility\htmlTags;
class profile extends utility\page
{
    protected $page;

    public function buildPage($content = '')
    {
        return $this->page .= $content . '<br>';

    }

}

$newPage = new profile();

$header = '<div class="container"><h1>User Profile</h1></div>';

$links = '<div class="container">
<h3><a href="index.php?page=tasks&action=all">Show All Tasks</a></h3></div>';


$newPage->buildPage($header);
$newPage->buildPage($links);
$table= \utility\htmlTable::generateTableFromOneRecord($data);
$newPage->buildPage($table);
$newPage->setHtml($newPage->buildPage());

?>
