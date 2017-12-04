<?php
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

$editForm = '<div class="container" <form action="index.php?page=createAcct" method="post">
			<div class="form-group">
			  <label for="email">Owner Email:</label>
			  <input type="email" class="form-control" id="OwnerEmail">
			<div class="form-group">
			    <label for="dueDate">Due Date:</label>
			    <input type="date" class="form-control" id="dueDate">
            </div>
			</div>
			<div class="form-group">
			  <label for="message">Message:</label>
			  <input type="text" class="form-control" id="message">
			</div>
			<div class="form-group">
			  <label for="isDone">Is Done:</label>
			  <input type="text" class="form-control" id="isDone">
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
			<button type="submit" class="btn btn-default" name="cancel">Cancel</button>
			</form> 
            <hr>
			<form action="index.php?page=tasks&action=delete&id=<?php $data[\'id\'] ?> " method="post" id="form1">
                <button type="submit" class="btn btn-default"form="form1" value="delete">Delete</button>
            </form>
            <hr>
			</div>';


$newPage->buildPage($header);
$newPage->buildPage($editForm);
$newPage->setHtml($newPage->buildPage());

?>




