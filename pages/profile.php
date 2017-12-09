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
            <form action="index.php?page=tasks&action=show_all_tasks&id=' . $data->id . ' " method="get" id="form1">
                <button class="btn btn-default col-sm-3" type="submit" form="form1" value="delete">View Tasks</button>
            </form>
            <form action="index.php?page=tasks&action=create&id=' . $data->id . ' " method="get" id="form1">
                <button class="btn btn-default col-sm-3" type="submit" form="form1" value="newTask"> New Task </button>
            </form>
            </div>
            </fieldset>
        </div><hr>';


$newPage->buildPage($header);
$newPage->buildPage($actionCenter);
$table= \utility\htmlTable::generateTableFromOneRecord($data);
$newPage->buildPage($table);
$newPage->setHtml($newPage->buildPage());

?>
