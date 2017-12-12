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

/*$actionMenu = '<div class="container">
            <fieldset class="fieldset"><legend>Action Center</legend>
            <div class="form-group">
            <form action="index.php?page=tasks&action=delete&id=' . $data->id . ' " method="post" id="form1">
                <button class="btn btn-default col-sm-3" type="submit" form="form1" value="delete">Delete</button>
            </form>
            <form action="index.php?page=tasks&action=edit&id=' . $data->id . ' " method="get" id="form2">
                <button class="btn btn-default col-sm-3" type="submit" form="form2" value="edit"> Edit </button>
            </form>
            <form action="index.php?page=tasks&action=create&id=' . $data->ownerid . ' " method="get" id="form3">
                <button class="btn btn-default col-sm-3" type="submit" form="form3" value="newTask"> New Task </button>
            </form>
            </div>
            </fieldset>
        </div>';*/

$actionCenterDropDown = '<div class="container"><div class="dropdown"><a class="btn btn-primary dropdown-toggle" type="button" id="actionButton" data-toggle="dropdown"><span class="glyphicon glyphicon-th-list"></span> Action Center <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?page=tasks&action=create&id=' . $_SESSION['id'] . ' "><span class="glyphicon glyphicon-plus-sign"></span> New Task</a></li>
                            </ul>
                         </div></div>';

$newPage->buildPage($header);
$newPage->buildPage($actionCenterDropDown);
//Table method modified to be generic
$table= \utility\htmlTable::generateTable($data);
$newPage->buildPage($table);
//$newPage->buildPage($actionMenu);
$newPage->setHtml($newPage->buildPage());

?>


