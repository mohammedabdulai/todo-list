<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//each page extends controller and the index.php?page=tasks causes the controller to be called
class accountsController extends http\controller
{
    //each method in the controller is named an action.
    //to call the show function the url is index.php?page=task&action=show
    public static function manage()
    {
        self::getTemplate('admin');
    }

    public static function show()
    {
        $record = accounts::findOne($_SESSION['id']);
        self::getTemplate('show_account', $record);
    }
    //to call the show function the url is index.php?page=task&action=list_task
    public static function all()
    {
        $records = accounts::findAll();
        self::getTemplate('all_accounts', $records);
    }
    //to call the show function the url is called with a post to: index.php?page=task&action=create
    //this is a function to create new tasks
    //you should check the notes on the project posted in moodle for how to use active record here
    //this is to register an account i.e. insert a new account
    public static function register()
    {
        $success = '<div class="container text-success"><b>Account created successfully! You may login</b></div>';
        $message = '';
        $clean = TRUE;
        $hashed_password = password_hash($_POST["password"],PASSWORD_BCRYPT);

        $record = new account();

        if(!$record->getClean($_REQUEST['username'])){
            $message = '<div class="container text-danger"><b>Invalid email entered</b></div><br>';
            $clean = FALSE;
        }else{
            $record->email = $record->getClean($_REQUEST['username']);
        }

        if(!$record->getClean($_REQUEST['fname'])){
            $message .= '<div class="container text-danger"><b>Invalid first name entered</b></div><br>';
            $clean = FALSE;
        }else{
            $record->fname = $record->getClean($_REQUEST['fname']);
        }

        if(!$record->getClean($_REQUEST['lname'])){
            $message .= '<div class="container text-danger"><b>Invalid last name entered</b></div><br>';
            $clean = FALSE;
        }else{
            $record->lname = $record->getClean($_REQUEST['lname']);
        }

        if(!$record->getClean($_REQUEST['password'])){
            $message .= '<div class="container text-danger"><b>Invalid password name entered</b></div><br>';
            $clean = FALSE;
        }else{
            $record->password = $hashed_password;
        }

        /*$record->fname = $record->getClean($_REQUEST['fname']);
        $record->lname = $record->getClean($_REQUEST['lname']);*/
        $record->phone = $record->getClean($_REQUEST['phone']);
        $record->birthday = $record->getClean($_REQUEST['birthday']);
        $record->gender = $record->getClean($_REQUEST['gender']);
        //$record->password = $hashed_password;
        if($clean==TRUE){
            $record->save();
            self::getTemplate('login', $success);
        }
        else{
        $error = "<div class='alert alert-warning' role='alert' id='warning_message'>Warning <i class='glyphicon glyphicon-alert'></i>$message</div>";
        self::getTemplate('signUp', $error);
        }
    }

    //this is the function to save the user the user profile
    public static function store()
    {
        print_r($_POST);
    }
    public static function edit()
    {
        $record = accounts::findOne($_SESSION['id']);
        self::getTemplate('edit_account', $record);
    }
    public static function save()
    {
        $id = $_SESSION['id'];
        $record = accounts::findOne($id);

        $record->email = $record->getClean($_POST['email']);
        $record->fname = $record->getClean($_POST['fname']);
        $record->lname = $record->getClean($_POST['lname']);
        $record->phone = $record->getClean($_POST['phone']);
        $record->gender = '';
        $record->birthday = '';
        $record->password = $_SESSION['user']->password;

        if(isset($_POST['password'])){
            $correct = password_verify($record->getClean($_POST['password']), $record->password);
            if($correct){
                if($record->getClean($_POST['newPassword'])=== $record->getClean($_POST['confirmPassword'])){
                    $record->password = password_hash($record->getClean($_POST["newPassword"]),PASSWORD_BCRYPT);
                }
            }

        }

        //print_r($record);
        $record->save();
        $record = accounts::findOne($_SESSION['id']);
        self::getTemplate('profile', $record);
    }
    //this is to login, here is where you find the account and allow login or deny.
    public static function login()
    {
        self::getTemplate('login');
    }

    public static function create()
    {
        self::getTemplate('signUp');
    }

    public static function profile()
    {
        $id = $_SESSION['id'];
        $record = accounts::findOne($id);
        self::getTemplate('profile', $record);
    }
    public static function logout()
    {
        $message = '<div class="container text-info"><b>logout successful! You may login back in or exit the browser.</b></div>';
        //log out code
            unset($_SESSION['user']);
            unset($_SESSION['username']);
            unset($_SESSION['id']);
            unset($_SESSION['role']);
            unset($_SESSION['login']);
            session_destroy();
            
        self::getTemplate('login', $message);
    }

    public static function authUser()
    {
        //grab user email and wrap with double quotes for database acceptance.
        $username = '"' . $_POST['username'] . '"';
        //Admin username and password
        $usr = 'admin@admin.com';
        $pwd = 'admin123';
        //Sanitize user input with to get rid of unwanted or harmful characters.
        //Throws error message if bad data is found
        if(!$newUserName = filter_var($username, FILTER_SANITIZE_EMAIL)){
            $message = '<div class="container text-danger"><b>Invalid username entered</b></div>';
            self::getTemplate('login', $message);
        }
        //Validate user input to make sure it's in the right format.
        //Throws error message if cannot meet right format
        if(!filter_var($newUserName, FILTER_VALIDATE_EMAIL)){
            $message = '<div class="container text-danger"><b>Invalid username entered</b></div>';
            self::getTemplate('login', $message);
        }else{
            //Fetch user records with the sanitized and validated username
            $userRecord = accounts::findUser($username);
        }
        //Check if username exist in accounts table
        //If no user found, throws error message and allows visitor to create an account
        if(!$userRecord){
            $message = '<div class="container text-danger"><b>No user found for username ' .$username.'. 
                        <a href="index.php?page=accounts&action=create"> Please click here to create an account</a></b></div>';
            self::getTemplate('login', $message);
        //If user exist, match the password entered with the hashed password stored in the database
        //If password matches, start a session and set user record, id, username, and role
        //If username and password matches admin, start session and set role as admin
        //If all fails, warm the visitor of invalid credentials.
        //On successful login, direct the user to see tasks.
        }else{
            if(password_verify($_REQUEST['password'], $userRecord->password))
            {
                $_SESSION['user'] = $userRecord;
                $_SESSION['id'] = $userRecord->id;
                $_SESSION['username'] = $userRecord->email;
                $_SESSION['login'] = TRUE;
                $_SESSION['role'] = 'regular';

                $userTasks = todos::findUserTasks($userRecord->id);
                self::getTemplate('show_task', $userTasks);

            }
            elseif($_POST['password'] == $pwd && $_POST['username'] == $usr)
            {
                $_SESSION['role'] = 'admin';
                $_SESSION['login'] = TRUE;
                $record = todos::findAll();
                self::getTemplate('admin', $record);
            }
            else {
                $message = '<div class="container"><b class="text-danger">Warning: Incorrect username or password</b></div>';
                self::getTemplate('login', $message);
            }
        }

    }
}

?>