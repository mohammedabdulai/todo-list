<?php
use utility\htmlTags;
class edit_account extends utility\page
{
    protected $page;

    public function buildPage($content = '')
    {
        return $this->page .= $content . '<br>';

    }

}

$newPage = new edit_account();

$header = '<div class="container"><h1>Edit Acccount</h1></div>';

$editForm = '<div class="container" <form action="index.php?page=createAcct" method="post">
			<div class="form-group">
			    <label for="email">First Name:</label>
			    <input type="text" class="form-control" id="fname">
			</div>
			<div class="form-group">
			    <label for="email">Last Name:</label>
			    <input type="text" class="form-control" id="lname">
			 </div>
			<div class="form-group">
			  <label for="email">Email address:</label>
			  <input type="email" class="form-control" id="email">
			<div class="form-group">
			    <label>Phone:</label>
			    <input type="tel" class="form-control" id="phone">
            </div>
			</div>
			<div class="form-group">
			  <label for="pwd">Old Password:</label>
			  <input type="password" class="form-control" id="pwd">
			</div>
			<div class="form-group">
			  <label for="pwd">New Password:</label>
			  <input type="password" class="form-control" id="pwd">
			</div>
			<div class="form-group">
			  <label for="pwd">Confirm Password:</label>
			  <input type="password" class="form-control" id="ConfirmPwd">
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
			<button type="submit" class="btn btn-default" name="cancel">Cancel</button>

			</form> </div>';

$newPage->buildPage($header);
$newPage->buildPage($editForm);
$newPage->setHtml($newPage->buildPage());

?>
