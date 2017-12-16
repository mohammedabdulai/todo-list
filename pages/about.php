<?php
use utility\htmlTags;
class about extends utility\page
{
    protected $page;

    public function buildPage($content = '')
    {
        return $this->page .= $content . '<br>';

    }

}

$newPage = new about();

$header = '<div class="container"><h1>About</h1></div>';

$links = '<div class="container">
<h3><a href="index.php?page=homepage">Go to Home</a></h3></div>';

$newPage->buildPage($header);
$newPage->buildPage($data);
$newPage->buildPage($links);
$newPage->setHtml($newPage->buildPage());

?>

