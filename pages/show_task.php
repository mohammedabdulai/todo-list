<?php
/*if($_SESSION['login'] == FALSE){
    header('Location: index.php?page=accounts&action=login');
}*/
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

$header = '<div class="container"><h1>Your Tasks</h1></div>';

$links = '<div class="container">
            <h3><a href="index.php?page=tasks&action=all">Show All Tasks</a></h3>
          </div>';

$actionCenterDropDown = '<div class="container"><div class="dropdown"><a class="btn btn-primary dropdown-toggle" type="button" id="actionButton" data-toggle="dropdown"><span class="glyphicon glyphicon-th-list"></span> Action Center <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?page=tasks&action=create&id=' . $_SESSION['id'] . ' "><span class="glyphicon glyphicon-plus-sign"></span> New Task</a></li>
                            </ul>
                         </div></div>';

$newPage->buildPage($header);
$newPage->buildPage($actionCenterDropDown);
//Table method modified to be generic
$table= \utility\htmlTable::generateTable($data);
//print_r($data);
$newPage->buildPage($table);
$newPage->setHtml($newPage->buildPage());

?>


