<?php
/*if($_SESSION['login'] == FALSE){
    header('Location: index.php?page=accounts&action=login');
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

$editForm = '<div class="container jumbotron" >
            <div class="row">
            <div class="col-md-6 col-md-offset-3"
            <form action="index.php?page=tasks&action=save&id= ' . $data->id . ' &owneremail= ' . $data->email . ' " method="post">
			<div class="form-group">
			    <label for="dueDate">Due Date:</label>
			    <input type="datetime-local" placeholder="mm/dd/yyy --:-- --" class="form-control" id="dueDate" name="duedate" required>
            </div>
			<div class="form-group">
			  <label for="message">Message:</label>
			  <input type="text"placeholder="Enter task here..." class="form-control" id="message" name="message" required>
			</div>
			<div class="form-group">
			<button type="submit" class="btn btn-default col-sm-6"><span class="glyphicon glyphicon-save"></span> Save</button>
			<a href="index.php?page=tasks&action=show_all&id=' . $data->id . '" class="btn btn-default col-sm-6" name="cancel"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
			</div>
			<br/>
			</form>
			</div>
			</div> 
			</div><hr>';


$newPage->buildPage($header);
$newPage->buildPage($editForm);
$newPage->setHtml($newPage->buildPage());

?>




