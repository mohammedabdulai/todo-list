<?php
use utility\htmlTags;
class all_accounts extends utility\page
{
    protected $page;

    public function buildPage($content = '')
    {
        return $this->page .= $content . '<br>';

    }

}

$newPage = new all_accounts();

$header = '<div class="container"><h1>User Accounts</h1></div>';

$links = '<div class="container">
<h3><a href="index.php?page=tasks&action=all">Show All Tasks</a></h3></div>';


$newPage->buildPage($header);
$newPage->buildPage($links);
$table= utility\htmlTable::genarateTableFromMultiArray($data);
$newPage->buildPage($table);
$newPage->setHtml($newPage->buildPage());

?>

