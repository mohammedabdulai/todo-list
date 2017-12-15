<?php
/*if($_SESSION['login'] == FALSE){
    header('Location: index.php?page=accounts&action=login');
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

$editForm = '<div class="container"><form action="index.php?page=tasks&action=update&id=' . $taskData['id'] . ' " method="post" id="edit_task">
			<div class="form-group">
			  <label for="email">Owner Email:</label>
			  <input type="email" class="form-control" id="OwnerEmail" value="'.$taskData['owneremail'].'" name="owneremail" required>
			</div>
			<div class="form-group">
			    <label for="dueDate">Due Date:</label>
			    <input type="datetime-local" class="form-control" id="dueDate" value="'.$taskData['duedate'].'" name="duedate" required>
            </div>
			<div class="form-group">
			  <label for="message">Message:</label>
			  <input type="text" class="form-control" id="message" value="'.$taskData['message'].'" name="message" required>
			</div>
			<div class="form-group">
			  <label for="isDone">Is Done:</label>
			  <input type="number" class="form-control" id="isDone" value="'.$taskData['isdone'].'" name="isdone" required>
			</div>
			<div class="form-group">
			<button type="submit" class="btn btn-default col-sm-6" form="edit_task"><span class="glyphicon glyphicon-save"> </span> Save</button>
			<a href="index.php?page=tasks&action=show_all&id=' . $taskData['ownerid'] . '" class="btn btn-default col-sm-6" name="cancel"><span class="glyphicon glyphicon-remove"> </span>  Cancel</a>
			</div>
			<br/>
			</form> 
            <hr>
            <fieldset class="fieldset"><legend>Action Center</legend>
			<form action="index.php?page=tasks&action=delete&id=' . $taskData['id'] . ' " method="post" id="form1">
                <button type="submit" class="btn btn-default"form="form1" value="delete">Delete</button>
            </form>
            </fieldset>
            <hr>
			</div>';


$newPage->buildPage($header);
$newPage->buildPage($editForm);
$newPage->setHtml($newPage->buildPage());

?>




