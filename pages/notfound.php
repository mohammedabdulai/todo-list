<?php
use utility\htmlTags;
class show_task extends utility\page
{
    protected $page;

    public function buildPage($content = '')
    {
        return $this->page .= $content . '<br>';

    }

}

$newPage = new show_task();

$header = '<div class="container"><center><h1>Oops! Something went wrong</h1></center></div>';

$links = '<div class="container">
<h3><a href="index.php?page=homepage">Go to Home</a></h3></div>';

$errorPage = '<div class="container"><div class="panel text-center"><h1>HTTP Status 404: Page Not Found</h1></div></div>';

$newPage->buildPage($header);
$newPage->buildPage($links);
$newPage->buildPage($errorPage);
$newPage->setHtml($newPage->buildPage());

?>

