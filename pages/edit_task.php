<?php
/*session_start();
if (!isset($_SESSION['username'])) {
    return header("location: index.php?page=login&action=login");
}*/
use utility\htmlTags;
class edit_task extends utility\page
{
    protected $page;

    public function buildPage($content = '')
    {
        return $this->page .= $content . '<br>';

    }

}

$newPage = new edit_task();

$header = '<div class="container"><h1>Edit Task</h1></div>';

$taskData = get_object_vars($data);

$editForm = '<div class="container" <form action="index.php?page=task&action=save&id=<?php $data[\'id\'] ?> " method="post">
			<div class="form-group">
			  <label for="email">Owner Email:</label>
			  <input type="email" class="form-control" id="OwnerEmail" value="'.$taskData['owneremail'].'">
			<div class="form-group">
			    <label for="dueDate">Due Date:</label>
			    <input type="datetime-local" class="form-control" id="dueDate" value="'.$taskData['duedate'].'">
            </div>
			</div>
			<div class="form-group">
			  <label for="message">Message:</label>
			  <input type="text" class="form-control" id="message" value="'.$taskData['message'].'">
			</div>
			<div class="form-group">
			  <label for="isDone">Is Done:</label>
			  <input type="text" class="form-control" id="isDone" value="'.$taskData['isdone'].'">
			</div>
			<div class="form-group">
			<button type="submit" class="btn btn-default col-sm-6">Submit</button>
			<button type="submit" class="btn btn-default col-sm-6" name="cancel">Cancel</button>
			</div>
			<br/>
			</form> 
            <hr>
            <fieldset class="fieldset"><legend>Action Center</legend>
			<form action="index.php?page=tasks&action=delete&id=<?php $data[\'id\'] ?> " method="post" id="form1">
                <button type="submit" class="btn btn-default"form="form1" value="delete">Delete</button>
            </form>
            </fieldset>
            <hr>
			</div>';


$newPage->buildPage($header);
$newPage->buildPage($editForm);
$newPage->setHtml($newPage->buildPage());

?>




