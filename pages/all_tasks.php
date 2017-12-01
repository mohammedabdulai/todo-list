<?php
use utility\htmlTags;
class all_tasks extends utility\page
{
    protected $page;

    public function buildPage($content = '')
    {
        return $this->page .= $content . '<br>';

    }

}

$newPage = new all_tasks();

$header = '<div class="container"><h1>All Tasks</h1></div>';

$links = '<div class="container">
<h3><a href="index.php?page=accounts&action=all">Show All Accounts</a></h3></div>';


$newPage->buildPage($header);
$newPage->buildPage($links);
$table= utility\htmlTable::genarateTableFromMultiArray($data);
$newPage->buildPage($table);
$newPage->setHtml($newPage->buildPage());

?>

