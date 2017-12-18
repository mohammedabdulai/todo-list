<?php
use utility\htmlTags;
class signUp extends utility\page
{
    protected $page;
    public function buildPage($content = '')
    {
        return $this->page .= $content . '<br>';
    }
}
$newPage = new signUp();

$header = '<div class="container"><h1>Create Acccount</h1></div>';
$loginLink = '<div class="container">
               <h3><a href="index.php?page=accounts&action=login">Have an account? Login</a></h3>
          </div>';

$signUpForm = '<div class="container" ><form class="form" id="signUpForm" action="index.php?page=accounts&action=register" method="post">
			<div class="form-group">
			    <label for="fname">First Name:</label>
			    <input type="text" class="form-control" id="fname" name="fname" required>
			</div>
			<div class="form-group">
			    <label for="lname">Last Name:</label>
			    <input type="text" class="form-control" id="lname" name="lname" required>
			 </div>
			<div class="form-group">
			  <label for="email">Email address:</label>
			  <input type="email" class="form-control" id="email" name="username" required>
			</div>
			<div class="form-group">
			  <label for="pwd">Password:</label>
			  <input type="password" class="form-control" id="pwd" name="password" required>
			</div>
			<div class="form-group">
			  <label for="pwd">Confirm Password:</label>
			  <input type="password" class="form-control" id="ConfirmPwd" name="confirmPwd" required>
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
			</form> </div>';

$newPage->buildPage($header);
$newPage->buildPage($signUpForm);
$newPage->buildPage($loginLink);
$newPage->setHtml($newPage->buildPage());
?>