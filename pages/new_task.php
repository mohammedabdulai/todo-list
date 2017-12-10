<?php
/*if (!isset($_SESSION['username'])) {
    return header("location: index.php?page=account&action=login");
}*/
use utility\htmlTags;
class new_task extends utility\page
{
    protected $page;

    public function buildPage($content = '')
    {
        return $this->page .= $content . '<br>';

    }

}

$newPage = new new_task();

$header = '<div class="container"><h1>Add New Task</h1></div>';

//$taskData = get_object_vars($data);

$editForm = '<div class="container" >
            <form action="index.php?page=task&action=save&id= ' . $data->id . ' &owneremail= ' . $data->email . ' " method="post">
			<div class="form-group">
			    <label for="dueDate">Due Date:</label>
			    <input type="datetime-local" class="form-control" id="dueDate" name="duedate" required>
            </div>
			<div class="form-group">
			  <label for="message">Message:</label>
			  <input type="text" class="form-control" id="message" name="message" required>
			</div>
			<div class="form-group">
			  <label for="isDone">Is Done:</label>
			  <input type="text" class="form-control" id="isdone" name="isdone" required>
			</div>
			<div class="form-group">
			<button type="submit" class="btn btn-default col-sm-6">Save</button>
			<button type="submit" formaction="index.php?page=task&action=show&id=<?= $data[\'id\'] ?>" formmethod="get" class="btn btn-default col-sm-6" name="cancel">Cancel</button>
			</div>
			<br/>
			</form> 
            <hr>
			</div>';


$newPage->buildPage($header);
$newPage->buildPage($editForm);
$newPage->setHtml($newPage->buildPage());

?>




