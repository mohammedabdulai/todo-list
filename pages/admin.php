<?php
use utility\htmlTags;
class admin extends utility\page
{
    protected $page;

    public function buildPage($content = '')
    {
        return $this->page .= $content . '<br>';

    }
    public function getHeader()
    {
        if (isset($data)) {
            $header = '<div class="container jumbotron"><center><h3>' . $data . '</h3></center></div>';
        } else {
            $header = ' <div class="container"><center><h1>Welcome to WebBull</h1></center>
                <blockquote><b>Get more done with WebBull!</b><p>Create and Manage todo tasks<br>
                Upload and view insights from CSV files<br>
                Much more to come</p></blockquote>
            </div>';

        }
        return $header;
    }

}

$newPage = new admin();


$links = '<div class="container">
            <h3><a href="index.php?page=accounts&action=all">Show All Accounts</a></h3>
            <h3><a href="index.php?page=tasks&action=all">Show All Tasks</a></h3>
        </div>';

$newPage->buildPage($newPage->getHeader());
$newPage->buildPage($links);
$newPage->buildPage($loginForm);

$newPage->setHtml($newPage->buildPage());


?>