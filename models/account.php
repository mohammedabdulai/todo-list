<?php
final class account extends \database\model
{
    public $id;
    public $email;
    public $fname;
    public $lname;
    public $phone;
    public $birthday;
    public $gender;
    public $password;
    protected static $modelName = 'account';
    public static function getTablename()
    {
        $tableName = 'accounts';
        return $tableName;
    }
    //to find a users tasks you need to create a method here.  Use $this->id to get the usersID For the query
    public static function findTasks()
    {
        //I am temporarily putting a findall here but you should add a method to todos that takes the USER ID and returns their tasks.
        $records = todos::findAll();
        return $records;
    }
    public function hashPassword($password) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        return $password;
    }
    //add a method to compare the passwords this is where bcrypt should be done and it should return TRUE / FALSE for login
    public function verifyPassword($LoginPassword) {
        return password_verify($LoginPassword, $this->password);
    }

    public function validate()
    {
        $valid = TRUE;
        if($this->email == '') {
            $valid = FALSE;
        }
        return $valid;
    }
    public function getClean($in)
    {
        $out = trim($in);
        $out = stripslashes($out);
        $out = htmlspecialchars($out);

        if(empty($out)){
            $out = '';
        }
        return $out;
    }
}
?>