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
        $message ='';
        $error = FALSE;
        //grab the users account object and save as record
        $id = $_SESSION['id'];
        $record = accounts::findOne($id);
        //Clean up user input with getClean function and set to user object property accordingly
        //Required fields
        //Validate and set email
        if(!filter_var($record->getClean($_REQUEST['email']), FILTER_VALIDATE_EMAIL)){
            $message .= '<div class="container text-danger"><b>Invalid email entered!</b></div><br>';
            $error = TRUE;
        }else{
            $record->email = $record->getClean($_REQUEST['email']);
        }
        //Validate and set first name
        if($record->getClean($_REQUEST['fname']) == '' || strlen($record->getClean($_REQUEST['fname']))<2){
            $message .= '<div class="container text-danger"><b>Invalid first name! Name must be at least two characters</b></div><br>';
            $error = TRUE;
        }elseif(is_numeric($_REQUEST['fname'])){
            $message .= '<div class="container text-danger"><b>Numeric entered! Name must be at least two characters</b></div><br>';
            $error = TRUE;
        }else{
            $record->fname = $record->getClean($_REQUEST['fname']);
        }
        //Validate and set last name
        if($record->getClean($_REQUEST['lname']) == '' || strlen($record->getClean($_REQUEST['lname']))<2){
            $message .= '<div class="container text-danger"><b>Invalid last name! First name must be at least two characters</b></div><br>';
            $error = TRUE;
        } elseif(is_numeric($_REQUEST['lname'])){
            $message .= '<div class="container text-danger"><b>Numeric entered! Last name must be at least two characters</b></div><br>';
            $error = TRUE;
        }else {
            $record->lname = $record->getClean($_REQUEST['lname']);
        }
        //Check if optional fields are set and get clean version of inputs.
        //If optional fields are not set, the the object property to empty string for database acceptance.
        //Check and set phone
        if(isset($_REQUEST['phone'])){
            $record->phone = $record->getClean($_REQUEST['phone']);
        }else{$record->phone = '';}
        //Checks and set gender
        if(isset($_REQUEST['gender'])){
            $record->gender = $record->getClean($_REQUEST['gender']);
        }else{$record->gender = '';}
        //Checks and set birthday
        if(isset($_REQUEST['birthday'])){
            $record->birthday = $record->getClean($_REQUEST['birthday']);
        }else{$record->birthday = '';}

        //Check if old password is entered by user then compared with hashed password stored in the database.
        //If there's a match, then compare the new password with the confirm password field.
        if(isset($_REQUEST['password']) && !empty($_REQUEST['password'])){
            $correct = password_verify($record->getClean($_REQUEST['password']), $record->password);
            //if entered password matches with hashed password in the database, compare new password fields
            //If new password and confirm password fields match, hash the new password and set to password property of object
            if($correct){
                if($record->getClean($_REQUEST['newPassword'])=== $record->getClean($_REQUEST['confirmPassword'])&& !empty($_REQUEST['newPassword'])){
                    $record->password = password_hash($record->getClean($_REQUEST["newPassword"]),PASSWORD_BCRYPT);
                //If new and confirm password fields don't match, prompt user with warming error message
                }else{
                    $message .= '<div class="container text-danger"><b>New password and confirm password don\'t match</b></div><br>';
                    $error = TRUE;
                }
            //Throw error message if old password entered by user doesn't match hashed password stored in database
            }else{
                $message .= '<div class="container text-danger"><b>Warning! You must entered old password to change your password</b></div><br>';
                $error = TRUE;
            }
        //If password field is not set, reset password property with hashed password stored for database acceptance of update.
        }else{$record->password = $_SESSION['user']->password;}
        //Check if new password fields contain value and old password is not set.
        if(isset($_REQUEST['newPassword'])&& !empty($_REQUEST['newPassword'])){
            if(isset($_REQUEST['confirmPassword']) && !empty($_REQUEST['confirmPassword'])){
                if(!isset($_REQUEST['password']) || empty($_REQUEST['password'])){
                    $message .='<div class="container text-danger"><b>Old password must be entered to change password</b></div><br>';
                    $error = TRUE;
                }
            }
        }
        //Check if confirm password field is set but new password field is not
        if(isset($_REQUEST['confirmPassword'])&& !empty($_REQUEST['confirmPassword'])){
            if(!isset($_REQUEST['newPassword']) || empty($_REQUEST['newPassword'])){
                $message .='<div class="container text-danger"><b>New password must match confirm password</b></div><br>';
                $error = TRUE;
            }
        }
        //Check if new password filed is set but confirm password field is not.
        if(isset($_REQUEST['newPassword'])&& !empty($_REQUEST['newPassword'])){
            if(!isset($_REQUEST['confirmPassword']) || empty($_REQUEST['confirmPassword'])){
                $message .='<div class="container text-danger"><b>New password must match confirm password</b></div><br>';
                $error = TRUE;
            }
        }

        //Check if there were any errors in validation.
        //If not, account data gets saved.
        if(!$error){
            //Save updated user account
            $record->save();
            //Grab the updated account and display to user
            $record = accounts::findOne($_SESSION['id']);
            self::getTemplate('profile', $record);
        //If there was any validation error, send user back to edit form with account data and error messages.
        }else{
            $arr[0]= accounts::findOne($_SESSION['id']);
            $arr[1] = $message;
            self::getTemplate('edit_account', $arr);
        }


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
    //Loads a signed on users profile.
    //If not signed on, visitor is directed to login.
    public static function profile()
    {
        if(!isset($_SESSION['id'])){
            $message = '<div class="container text-danger"><b>You must login to view profile</b></div>';
            self::getTemplate('login', $message);
        }else{
            $id = $_SESSION['id'];
            $record = accounts::findOne($id);
            self::getTemplate('profile', $record);
        }
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
        if(isset($userRecord)) {
            if (!$userRecord) {
                $message = '<div class="container text-danger"><b>No user found for username ' . $username . '. 
                        <a href="index.php?page=accounts&action=create"> Please click here to create an account</a></b></div>';
                self::getTemplate('login', $message);
                //If user exist, match the password entered with the hashed password stored in the database
                //If password matches, start a session and set user record, id, username, and role
                //If username and password matches admin, start session and set role as admin
                //If all fails, warm the visitor of invalid credentials.
                //On successful login, direct the user to see tasks.
            } else {
                if (password_verify($_REQUEST['password'], $userRecord->password)) {
                    $_SESSION['user'] = $userRecord;
                    $_SESSION['id'] = $userRecord->id;
                    $_SESSION['username'] = $userRecord->email;
                    $_SESSION['login'] = TRUE;
                    $_SESSION['role'] = 'regular';

                    $userTasks = todos::findUserTasks($userRecord->id);
                    self::getTemplate('show_task', $userTasks);

                } elseif ($_POST['password'] == $pwd && $_POST['username'] == $usr) {
                    $_SESSION['role'] = 'admin';
                    $_SESSION['login'] = TRUE;
                    $record = todos::findAll();
                    self::getTemplate('admin', $record);
                } else {
                    $message = '<div class="container"><b class="text-danger">Warning: Incorrect username or password</b></div>';
                    self::getTemplate('login', $message);
                }
            }
        }

    }
}

?>