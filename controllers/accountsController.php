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
        $hashed_password = password_hash($_POST["password"],PASSWORD_BCRYPT);

        $record = new account();
        $record->email = $record->getClean($_POST['username']);
        $record->fname = $record->getClean($_POST['fname']);
        $record->lname = $record->getClean($_POST['lname']);
        $record->phone = '';
        $record->birthday = '';
        $record->gender = '';
        $record->password = $hashed_password;

        $record->save();

        //$record = accounts::findUser($record->email);
        self::getTemplate('homepage', $record);
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
        $message = '<div class="container text-success"><b>logout successful!</b></div>';
        //log out code
            unset($_SESSION['user']);
            unset($_SESSION['username']);
            unset($_SESSION['id']);
            unset($_SESSION['role']);
            unset($_SESSION['login']);
            session_destroy();
            
        self::getTemplate('homepage', $message);
    }

    public static function authUser()
    {
        //you will need to fix this so we can find users username.  YOu should add this method findUser to the accounts collection
        //when you add the method you need to look at my find one, you need to return the user object.
        //then you need to check the password and create the session if the password matches.
        //you might want to add something that handles if the password is invalid, you could add a page template and direct to that
        //after you login you can use the header function to forward the user to a page that displays their tasks.
        $username = '"' . $_POST['username'] . '"';
        $usr = 'admin@admin.com';
        $pwd = 'admin123';


        $userRecord = accounts::findUser($username);

        if(password_verify($_POST['password'], $userRecord->password))
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

?>