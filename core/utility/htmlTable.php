<?php
namespace utility;
//namespace MyProject\mvcName;
class htmlTable
{
    //Method created to route table generate to the right method
    //Array passed to this method will call the right method to build table.
    //Displays message if table array is empty.
    public static function generateTable($array){
        $arrCnt = count($array);
        if($arrCnt < 1){
            return '<div class="container jumbotron">
                        <h2 class="text-info">You don\'t have any task, kudos!</h2>
                        <a href="index.php?page=tasks&action=create&id='. $_SESSION['id'].'"><span class="glyphicon glyphicon-plus-sign"> </span> Create New Task </a>
                    </div>';
        }elseif ($arrCnt == 1){
            return self::generateTableFromOneRecord($array);
        }
        else{
            return self::generateTableFromMultiArray($array);
        }
    }
    public static function generateTableFromMultiArray($array)
    {
        $tableGen = '<div class="container jumbotron">';
        $tableGen .= '<table class="table table-condensed table-hover">';
        $tableGen .= '<tr>';
        //this grabs the first element of the array so we can extract the field headings for the table
        $fieldHeadings = $array[0];
        $fieldHeadings = get_object_vars($fieldHeadings);
        $fieldHeadings = array_keys($fieldHeadings);
        //this gets the page being viewed so that the table routes requests to the correct controller
        $referingPage = $_REQUEST['page'];
        foreach ($fieldHeadings as $heading) {
            if($heading == 'id'){
                $tableGen .= '<th class="bg-info">Actions</th>';
            }else {
                $tableGen .= '<th class="bg-info">' . $heading . '</th>';
            }
        }
        $tableGen .= '</tr>';
        foreach ($array as $record) {
            $tableGen .= '<tr>';
            foreach ($record as $key => $value) {
                if ($key == 'id') {
                    $tableGen .= '<td><a href="index.php?page=' . $referingPage . '&action=show&id=' . $value . '"><span class="glyphicon glyphicon-eye-open"> </span>  </a>';
                    $tableGen .= '<a href="index.php?page=' . $referingPage . '&action=edit&id=' . $value . '"><span class="glyphicon glyphicon-edit"> </span>  </a>';
                    $tableGen .= '<a href="index.php?page=' . $referingPage . '&action=delete&id=' . $value . '"><span class="glyphicon glyphicon-trash"> </span>  </a></td>';
                } else {
                    $tableGen .= '<td>' . $value . '</td>';
                }
            }
            $tableGen .= '</tr>';
        }
        $tableGen .= '</table></div><hr>';
        return $tableGen;
    }
    public static function generateTableFromOneRecord($innerArray)
    {
        $tableGen = '<div class="container jumbotron">';
        $tableGen .= '<table class="table table-condensed table-hover"><tr>';
        $referingPage = $_REQUEST['page'];
        
        foreach ($innerArray as $innerRow => $value) {
            if($innerRow == 'id'){
                $tableGen .= '<th class="bg-info">Actions</th>';
            }else {
                $tableGen .= '<th class="bg-info">' . $innerRow . '</th>';
            }
        }
        $tableGen .= '</tr>';
        $tableGen .= '<tr>';

            foreach ($innerArray as $key => $value) {
                if ($key == 'id') {
                    $tableGen .= '<td><a href="index.php?page=' . $referingPage . '&action=edit&id=' . $value . '"><span class="glyphicon glyphicon-edit"> </span>  </a>';
                    $tableGen .= '<a href="index.php?page=' . $referingPage . '&action=delete&id=' . $value . '"><span class="glyphicon glyphicon-trash"> </span>  </a></td>';
                } else {
                    $tableGen .= '<td>' . $value . '</td>';
                }
            }
        $tableGen .= '</tr>';
        $tableGen .= '</table></div><hr>';
        return $tableGen;
    }
}
?>

