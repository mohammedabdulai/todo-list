<?php
/*if($_SESSION['login'] == FALSE){
    header('Location: index.php?page=accounts&action=login');
}*/
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

$userData = get_object_vars($data);

$editForm = '<div class="container">
            <div class="container jumbotron col-sm-8">
            <form action="index.php?page=accounts&action=save&id='.$userData['id'].'" method="post">
			<div class="form-group">
			    <label for="email">First Name:</label>
			    <input type="text" class="form-control" id="fname" value="'.$userData['fname'].'" name="fname" required>
			</div>
			<div class="form-group">
			    <label for="email">Last Name:</label>
			    <input type="text" class="form-control" id="lname" value="'.$userData['lname'].'" name="lname" required>
			 </div>
			<div class="form-group">
			  <label for="email">Email address:</label>
			  <input type="email" class="form-control" id="email" value="' .$userData['email']. '" name="email" required>
			</div>
			<div class="form-group">
			    <label>Phone:</label>
			    <input type="tel" class="form-control" id="phone" value="' .$userData['phone']. '" name="phone" placeholder="Ex: 3334447777">
            </div>
			<div class="form-group">
			  <label for="pwd">Old Password:</label>
			  <input type="password" class="form-control" id="pwd" name="password" placeholder="Required to change password">
			</div>
			<div class="form-group">
			  <label for="pwd">New Password:</label>
			  <input type="password" class="form-control" id="pwd" name="newPassword" placeholder="Enter ONLY if changing password">
			</div>
			<div class="form-group">
			  <label for="pwd">Confirm Password:</label>
			  <input type="password" class="form-control" id="ConfirmPwd" name="confirmPassword" placeholder="Must match new password">
			</div>
			<button type="submit" class="btn btn-default col-sm-6"><span class="glyphicon glyphicon-save"></span> Save</button>
			<a class="btn btn-default col-sm-6" href="index.php?page=accounts&action=profile" name="cancel"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
			</form></div></div>';

$newPage->buildPage($header);
$newPage->buildPage($editForm);
$newPage->setHtml($newPage->buildPage());

?>
