<?php
/*if($_SESSION['login'] == FALSE){
    header('Location: index.php?page=accounts&action=login');
}*/
use utility\htmlTags;
class profile extends utility\page
{
    protected $page;

    public function buildPage($content = '')
    {
        return $this->page .= $content . '<br>';

    }

}

$newPage = new profile();

$header = '<div class="container"><h1>User Profile</h1></div>';

$actionCenterDropDown = '<div class="container"><div class="dropdown"><a class="btn btn-primary dropdown-toggle" type="button" id="actionButton" data-toggle="dropdown"><span class="glyphicon glyphicon-th-list"></span> Action Center <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?page=accounts&action=edit&id=' . $data->id . ' "><span class="glyphicon glyphicon-edit"></span> Edit</a></li>
                                <li><a href="index.php?page=tasks&action=show_all"><span class="glyphicon glyphicon-eye-open"></span> View Tasks</a></li>
                                <li><a href="index.php?page=tasks&action=create"><span class="glyphicon glyphicon-plus-sign"></span> New Task</a></li>
                            </ul>
                         </div></div><hr>';

$editAccount = '<div class="container jumbotron">
            <form class="form-horizontal" action="index.php?page=accounts&action=edit" method="get" id="editProfile">
			<div class="form-group">
			    <label class="control-label col-sm-2" for="email">First Name:</label>
			    <div class="col-sm-8">
			        <input type="text" class="form-control" id="fname" value="'. $data->fname .'" disabled>
			    </div>
			</div>
			<div class="form-group">
			    <label class="control-label col-sm-2" for="email">Last Name:</label>
			    <div class="col-sm-8">
			        <input type="text" class="form-control col-sm-8" id="lname" value="'. $data->lname .'" disabled>
			    </div>
			 </div>
			<div class="form-group">
			  <label class="control-label col-sm-2" for="email">Email address:</label>
			  <div class="col-sm-8">
			    <input type="email" class="form-control col-sm-8" id="email" value="' . $data->email . '" disabled>
			  </div>
			</div>
			<div class="form-group">
			    <label class="control-label col-sm-2">Phone:</label>
			    <div class="col-sm-8">
			        <input type="tel" placeholder="732-777-7777" class="form-control col-sm-8" id="phone" value="' . $data->phone . '" disabled>
			    </div>
            </div>
            <div class="form-group">
			    <label class="control-label col-sm-2">Birthday:</label>
			    <div class="col-sm-8">
			        <input type="date" placeholder="2017-05-13" class="form-control col-sm-8" id="phone" value="' . $data->birthday . '" disabled>
			    </div>
            </div>
            <div class="form-group">
			    <label class="control-label col-sm-2">Gender:</label>
			    <div class="col-sm-8">
			        <input type="text" placeholder="Male or Female" class="form-control col-sm-8" id="phone" value="' . $data->gender . '" disabled>
			    </div>
            </div>
            <div class="form-group">
			    <label class="control-label col-sm-2">Password:</label>
			    <div class="col-sm-8">
			        <input type="password" class="form-control col-sm-8" id="phone" value="' . $data->password . '" disabled>
			    </div>
            </div>
            <div class="form-group">
			<a href="index.php?page=accounts&action=edit" class="btn btn-default col-sm-2"><span class="glyphicon glyphicon-edit"></span> Edit</a>
			<a href="index.php?page=tasks&action=show_all" class="btn btn-default col-sm-8" name="cancel"><span class="glyphicon glyphicon-eye-open"></span> View Tasks</a>
            </div>
			</form></div><hr>';


$newPage->buildPage($header);
$newPage->buildPage($actionCenterDropDown);
$newPage->buildPage($editAccount);
$newPage->setHtml($newPage->buildPage());

?>
