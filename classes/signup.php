<?php
/**
* 
*/
class signup extends page
{
	public function get(){
		$this->html .= '<div class="container" <form action="index.php?page=createAcct" method="post">
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
			</div>
			<div class="form-group">
			  <label for="pwd">Password:</label>
			  <input type="password" class="form-control" id="pwd">
			</div>
			<div class="form-group">
			  <label for="pwd">Confirm Password:</label>
			  <input type="password" class="form-control" id="ConfirmPwd">
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
			</form> </div>';

	}
}

?>