<?php
final class todo extends database\model
{
    public $id;
    public $owneremail;
    public $ownerid;
    public $createddate;
    public $duedate;
    public $message;
    public $isdone;
    protected static $modelName = 'todo';

    public static function getTablename()
    {
        $tableName = 'todos';
        return $tableName;
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