<?php
//this is the controller for the index page.
//You are going to need to create / use a accounts controller that deals with login and registration you should not submit the post for the to the index controller
//POST index.php?page=accounts?action=create for adding a user
//POST index.php?page=accounts?action=login for logging a  user in and get the userID out of the session
//POST index.php?page=accounts?action=logout  this would destroy the session and return the user to the homepage
//GET  index.php?page=accounts?action=show  this would be to show the user profile and you get the userID out of session
class aboutController extends http\controller
{
    public static function show()
    {
        $about = '<div class="container jumbotron"><h2>This is about page</h2></div>';
        self::getTemplate('about', $about);
    }

}