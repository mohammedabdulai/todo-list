<?php

class routes
{
    public static function getRoutes()
    {
        //bellow adds routes to your program, routes match the URL and request method with the controller and method.
        //You need to follow this pattern to add new URLS
        //You should improve this function by making functions to create routes in a factory. I will look for this when grading
        //I also use object for the route because it has data and it's easier to access.
        $route = new route();
        //this is the index.php route for GET
        //Specify the request method
        $route->http_method = 'GET';
        //specify the page.  index.php?page=index.  (controller name / method called
        $route->page = 'homepage';
        //specify the action that is in the URL to trigger this route index.php?page=index&action=show
        $route->action = 'show';
        //specify the name of the controller class that will contain the functions that deal with the requests
        $route->controller = 'homepageController';
        //specify the name of the method that is called, the method should be the same as the action
        $route->method = 'show';
        //this adds the route to the routes array.
        $routes[] = $route;

        $route = new route();
        $route->http_method = 'GET';
        $route->action = 'manage';
        $route->page = 'admin';
        $route->controller = 'tasksController';
        $route->method = 'manage';
        $routes[] = $route;
        //this is the index.php route for POST
        //This is an examole of the post for index
        $route = new route();
        $route->http_method = 'POST';
        $route->action = 'create';
        $route->page = 'homepage';
        $route->controller = 'tasksController';
        $route->method = 'create';
        $routes[] = $route;
        //This is an examole of the post for tasks to show a task
        //GET METHOD index.php?page=tasks&action=show
        $route = new route();
        $route->http_method = 'GET';
        $route->action = 'show';
        $route->page = 'tasks';
        $route->controller = 'tasksController';
        $route->method = 'show';
        $routes[] = $route;
        //This is an examole of the post for tasks to list tasks.  See the action matches the method name.
        //you need to add routes for create, edit, and delete
        //GET METHOD index.php?page=tasks&action=all
        $route = new route();
        $route->http_method = 'GET';
        $route->action = 'all';
        $route->page = 'tasks';
        $route->controller = 'tasksController';
        $route->method = 'all';
        $routes[] = $route;
        //GET METHOD index.php?page=accounts&action=all
        $route = new route();
        $route->http_method = 'GET';
        $route->action = 'all';
        $route->page = 'accounts';
        $route->controller = 'accountsController';
        $route->method = 'all';
        $routes[] = $route;
        //GET METHOD index.php?page=accounts&action=show
        $route = new route();
        $route->http_method = 'GET';
        $route->action = 'show';
        $route->page = 'accounts';
        $route->controller = 'accountsController';
        $route->method = 'show';
        $routes[] = $route;
        //This goes in the login form action method
        //GET METHOD index.php?page=accounts&action=login
        //Login page route
        $route = new route();
        $route->http_method = 'GET';
        $route->action = 'login';
        $route->page = 'account';
        $route->controller = 'accountsController';
        $route->method = 'login';
        $routes[] = $route;
        //Route to authenticate users
        $route = new route();
        $route->http_method = 'POST';
        $route->action = 'authUser';
        $route->page = 'account';
        $route->controller = 'accountsController';
        $route->method = 'authUser';
        $routes[] = $route;
        //Sign up page route
        $route = new route();
        $route->http_method = 'GET';
        $route->action = 'create';
        $route->page = 'account';
        $route->controller = 'accountsController';
        $route->method = 'create';
        $routes[] = $route;

        //Route to save new account info
        $route = new route();
        $route->http_method = 'POST';
        $route->action = 'register';
        $route->page = 'account';
        $route->controller = 'accountsController';
        $route->method = 'register';
        $routes[] = $route;
        //Profile page route
        $route = new route();
        $route->http_method = 'GET';
        $route->action = 'profile';
        $route->page = 'account';
        $route->controller = 'accountsController';
        $route->method = 'profile';
        $routes[] = $route;
        //Logout page route
        $route = new route();
        $route->http_method = 'GET';
        $route->action = 'logout';
        $route->page = 'account';
        $route->controller = 'accountsController';
        $route->method = 'logout';
        $routes[] = $route;
        //YOU WILL NEED TO ADD MORE ROUTES
        $route = new route();
        $route->http_method = 'POST';
        $route->action = 'delete';
        $route->page = 'tasks';
        $route->controller = 'tasksController';
        $route->method = 'delete';
        $routes[] = $route;

        $route = new route();
        $route->http_method = 'GET';
        $route->action = 'edit';
        $route->page = 'account';
        $route->controller = 'accountsController';
        $route->method = 'edit';
        $routes[] = $route;
        //Edit task route
        $route = new route();
        $route->http_method = 'GET';
        $route->action = 'edit';
        $route->page = 'task';
        $route->controller = 'tasksController';
        $route->method = 'edit';
        $routes[] = $route;
        //Create new task route
        $route = new route();
        $route->http_method = 'GET';
        $route->action = 'create';
        $route->page = 'task';
        $route->controller = 'tasksController';
        $route->method = 'create';
        $routes[] = $route;

        //Save new task route
        $route = new route();
        $route->http_method = 'POST';
        $route->action = 'save';
        $route->page = 'task';
        $route->controller = 'tasksController';
        $route->method = 'save';
        $routes[] = $route;

        return $routes;
    }
}
//this is the route prototype object  you would make a factory to return this
class route
{
    public $page;
    public $action;
    public $method;
    public $controller;
}