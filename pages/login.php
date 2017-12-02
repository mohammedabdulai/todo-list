<?php
use utility\htmlTags;
class login extends utility\page
{
    protected $page;

    public function buildPage($content = '')
    {
        return $this->page .= $content . '<br>';

    }

}

$newPage = new login();

$header = '<div class="container"><h1>Login</h1></div>';

$signUpLink = '<div class="container">
               <h3><a href="index.php?page=signUp">Need account? Sign Up</a></h3>
          </div>';

$loginForm = '<div class="container"><form class="form-inline" action="auth.php" method="post">
			  <div class="form-group">
			    <label for="email">Email address:</label>
			    <input type="email" class="form-control" name="email">
			  </div>
			  <div class="form-group">
			    <label for="pwd">Password:</label>
			    <input type="password" class="form-control" name="pwd">
			  </div>
			  <div class="checkbox">
			    <label><input type="checkbox"> Remember me</label>
			  </div>
			  <button type="submit" class="btn btn-default">Submit</button>
			</form></div>';

$newPage->buildPage($header);
$newPage->buildPage($loginForm);
$newPage->buildPage($signUpLink);
$newPage->setHtml($newPage->buildPage());

?>


