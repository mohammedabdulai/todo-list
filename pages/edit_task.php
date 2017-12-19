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

$editForm = '<div class="container jumbotron">
            <div class="row">  
            <div class="col-md-8 col-md-offset-1">
            <form class="form-horizontal" action="index.php?page=tasks&action=update&id=' . $taskData['id'] . ' " method="post" id="edit_task">
			<div class="form-group">
			  <label class="control-label col-sm-3" for="email">Owner Email:</label>
			  <div class="col-sm-9 inputGroupContainer">
			  <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
			  <input type="email" class="form-control" id="OwnerEmail" value="'.$taskData['owneremail'].'" name="owneremail" required>
			  </div>
			  </div>
			</div>
			<div class="form-group">
			    <label class="control-label col-sm-3" for="dueDate">Due Date:</label>
			  <div class="col-sm-9 inputGroupContainer">
			  <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
			    <input type="text" placeholder="'.$taskData['duedate'].'" class="form-control" id="dueDate" value="'.$taskData['duedate'].'" name="duedate" required>
             </div>
             </div>
            </div>
			<div class="form-group">
			  <label class="control-label col-sm-3" for="message">Message:</label>
			  <div class="col-sm-9 inputGroupContainer">
			  <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
			  <input type="text" class="form-control" id="message" value="'.$taskData['message'].'" name="message" required>
			</div> 
			</div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-3" for="isDone">Is Done:</label>
			  <div class="col-sm-9 inputGroupContainer">
			  <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-check"></i></span>
              <select class="form-control" id="isDone" name="isdone" required>
                <option value="1">Yes</option>
                <option value="0">No</option>
                <option value="'.$taskData['isdone'].'" selected>'. $taskData["isdone"] .'</option>
              </select>
			  </div>
			  </div>
			</div>
			<div class="form-group">
			<button type="submit" class="btn btn-default col-sm-2 col-sm-offset-5" form="edit_task"><span class="glyphicon glyphicon-save"> </span> Save</button>
			<a href="index.php?page=tasks&action=show_all&id=' . $taskData['ownerid'] . '" class="btn btn-default col-sm-2" name="cancel"><span class="glyphicon glyphicon-remove"> </span>  Cancel</a>
			</div>
			<br/>
			</form> 
			</div>
			</div>
            <hr>
            <fieldset class="fieldset"><legend>Action Center</legend>
			<form action="index.php?page=tasks&action=delete&id=' . $taskData['id'] . ' " method="post" id="form1">
                <button type="submit" class="btn btn-primary"form="form1" value="delete"><span class="glyphicon glyphicon-trash"> </span> Delete</button>
            </form>
            </fieldset>
            <hr>
			</div>';


$newPage->buildPage($header);
$newPage->buildPage($editForm);
$newPage->setHtml($newPage->buildPage());

?>




