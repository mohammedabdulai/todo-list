<?php
/*session_start();
if (!isset($_SESSION['username'])) {
    return header("location: index.php?page=login&action=login");
}*/
use utility\htmlTags;
class show_account extends utility\page
{
    protected $page;

    public function buildPage($content = '')
    {
        return $this->page .= $content . '<br>';

    }

}

$newPage = new show_account();

$header = '<div class="container"><h1>User Account</h1></div>';

$links = '<div class="container">
<h3><a href="index.php?page=accounts&action=all">Show All Accounts</a></h3></div>';


$newPage->buildPage($header);
$newPage->buildPage($links);
$table= \utility\htmlTable::generateTableFromOneRecord($data);
$newPage->buildPage($table);
$newPage->setHtml($newPage->buildPage());

?>
