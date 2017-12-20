<?php
class todos extends database\collection
{
    protected static $modelName = 'todo';
    //This is the function to write to find tasks by user ID for listing on their homepage.
    //Don't forget to return the record set see findAll in the collection class
    public static  function findTasksbyID($userid) {}

    static public function findUserTasks($id)
    {
        $tableName = get_called_class();
        $sql = 'SELECT * FROM ' . $tableName . ' WHERE ownerid =' . $id;
        $recordSet = self::getResults($sql);
        if(count($recordSet)==1){
            return $recordSet[0];
        }else{
            return $recordSet;
        }
    }

    public static  function findTaskIDbyOwnerID($id) {
        $tableName = get_called_class();
        $sql = 'SELECT id FROM ' . $tableName . ' WHERE ownerid =' . $id;
        //grab the only record for find one and return as an object
        $recordsSet = self::getResults($sql);
        return $recordsSet[0];
    }
}
?>