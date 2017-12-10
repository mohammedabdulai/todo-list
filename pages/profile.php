<?php
/*session_start();
if (!isset($_SESSION['username'])) {
    return header("location: index.php?page=login&action=login");
}*/
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

$actionCenter = '<div class="container">
            <fieldset class="fieldset"><legend>Action Center</legend>
            <div class="form-group">
            <form action="index.php?page=account&action=edit&id=' . $data->id . '" method="get" id="form1">
                 <button class="btn btn-default col-sm-3" type="submit" form="form1" value="edit"> View/Edit Account </button>
            </form>
            <form action="index.php?page=tasks&action=show_all_tasks&id=' . $data->id . ' " method="get" id="form2">
                <button class="btn btn-default col-sm-3" type="submit" form="form2" value="delete">View Tasks</button>
            </form>
            <form action="index.php?page=tasks&action=create&id=' . $data->id . ' " method="get" id="form3">
                <button class="btn btn-default col-sm-3" type="submit" form="form3" value="newTask"> New Task </button>
            </form>
            </div>
            </fieldset>
        </div><hr>';

$actionCenterDropDown = '<div class="container"><div class="dropdown"><a class="btn btn-primary dropdown-toggle" type="button" id="actionButton" data-toggle="dropdown"><span class="glyphicon glyphicon-th-list"></span> Action Center <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?page=account&action=edit&id=' . $data->id . ' ">Edit</a></li>
                                <li><a href="index.php?page=tasks&action=show&id=' . $data->id . ' ">View Tasks</a></li>
                                <li><a href="index.php?page=task&action=create&id=' . $data->id . ' ">New Task</a></li>
                            </ul>
                         </div></div>';


$newPage->buildPage($header);
$newPage->buildPage($actionCenterDropDown);
//$newPage->buildPage($actionCenter);
$table= \utility\htmlTable::generateTableFromOneRecord($data);
$newPage->buildPage($table);
$newPage->setHtml($newPage->buildPage());

?>
