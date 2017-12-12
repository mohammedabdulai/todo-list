<?php
//each page extends controller and the index.php?page=tasks causes the controller to be called
class tasksController extends http\controller
{
    //each method in the controller is named an action.
    //to call the show function the url is index.php?page=task&action=show
    public static function show()
    {
        $record = todos::findOne($_REQUEST['id']);
        self::getTemplate('show_task', $record);
    }
    //Method to show all logged on user tasks.
    //If not task yet, user is directed to create a new task.
    public static function show_all()
    {
        $record = todos::findUserTasks($_REQUEST['id']);
        $arr = (array)$record;
        if(!empty($arr)){
            self::getTemplate('show_task', $record);
        }else{
            $record = accounts::findOne($_REQUEST['id']);
            self::getTemplate('new_task', $record);
        }

    }
    //to call the show function the url is index.php?page=task&action=list_task
    public static function all()
    {
        $records = todos::findAll();
        self::getTemplate('all_tasks', $records);
    }
    //to call the show function the url is called with a post to: index.php?page=task&action=create
    //this is a function to create new tasks
    //you should check the notes on the project posted in moodle for how to use active record here
    public static function create()
    {
        $record = accounts::findOne($_REQUEST['id']);
        self::getTemplate('new_task', $record);
    }

    //this is the function to view edit record form
    public static function edit()
    {
        //$id = todos::findTaskIDbyOwnerID($_REQUEST['id']);
        $record = todos::findOne($_REQUEST['id']);
        self::getTemplate('edit_task', $record);
    }

    //this would be for the post for sending the task edit form
    public static function store()
    {
        $record = todos::findOne($_REQUEST['id']);
        $record->body = $_REQUEST['body'];
        $record->save();
    }
    //this is the delete function.  You actually return the edit form and then there should be 2 forms on that.
    //One form is the todo and the other is just for the delete button
    public static function delete()
    {
        $record = todos::findOne($_REQUEST['id']);
        $ownerid = $record->ownerid;
        $record->delete();
        $record = todos::findUserTasks($ownerid);
        self::getTemplate('show_task', $record);
    }

    public static function save()
    {
        date_default_timezone_set('America/New_York');
        $record = new todo();
        $record->owneremail = $_REQUEST['owneremail'];
        $record->ownerid = $_REQUEST['id'];
        $record->createddate = date("m/d/Y h:i:sa");
        $record->duedate = $_POST['duedate'];
        $record->message = $_POST['message'];
        $record->isdone = $_POST['isdone'];
        $record->save();

        $record = todos::findUserTasks($_REQUEST['id']);
        self::getTemplate('show_task', $record);
    }
}