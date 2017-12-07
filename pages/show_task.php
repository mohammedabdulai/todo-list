<?php
/*session_start();
if (!isset($_SESSION['username'])) {
    return header("location: index.php?page=login&action=login");
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

$header = '<div class="container"><h1>User Task</h1></div>';

$links = '<div class="container">
<h3><a href="index.php?page=tasks&action=all">Show All Tasks</a></h3></div>';
$form = '<div class="container">
            <fieldset class="fieldset"><legend>Action Center</legend>
            <div class="form-group">
            <form action="index.php?page=tasks&action=delete&id=<?php echo $data->id; ?> " method="post" id="form1">
                <button class="btn btn-default col-sm-3" type="submit" form="form1" value="delete">Delete</button>
            </form>
            <form action="index.php?page=task&action=edit&id=1" method="get" id="form1">
                <button class="btn btn-default col-sm-3" type="submit" form="form1" value="edit"> Edit </button>
            </form>
            <form action="index.php?page=tasks&action=create&owneremail=<?php echo $data->owneremail; ?> " method="get" id="form1">
                <button class="btn btn-default col-sm-3" type="submit" form="form1" value="newTask"> New Task </button>
            </form>
            </div>
            </fieldset>
        </div>';


$newPage->buildPage($header);
$newPage->buildPage($links);
$table= \utility\htmlTable::generateTableFromOneRecord($data);
$newPage->buildPage($table);
$newPage->buildPage($form);
$newPage->setHtml($newPage->buildPage());

?>


