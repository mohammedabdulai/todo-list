<?php
namespace utility;
//namespace MyProject\mvcName;
class htmlTable
{
    public static function genarateTableFromMultiArray($array)
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
            $tableGen .= '<th class="bg-info">' . $heading . '</th>';
        }
        $tableGen .= '</tr>';
        foreach ($array as $record) {
            $tableGen .= '<tr>';
            foreach ($record as $key => $value) {
                if ($key == 'id') {
                    $tableGen .= '<td><a href="index.php?page=' . $referingPage . '&action=show&id=' . $value . '">View</a></td>';
                } else {
                    $tableGen .= '<td>' . $value . '</td>';
                }
            }
            $tableGen .= '</tr>';
        }
        $tableGen .= '</table>';
        return $tableGen;
    }
    public static function generateTableFromOneRecord($innerArray)
    {
        $tableGen = '<div class="container jumbotron">';
        $tableGen .= '<table class="table table-condensed table-hover"><tr>';
        $tableGen .= '<tr>';
        foreach ($innerArray as $innerRow => $value) {
            $tableGen .= '<th class="bg-info">' . $innerRow . '</th>';
        }
        $tableGen .= '</tr>';
        foreach ($innerArray as $value) {
            $tableGen .= '<td>' . $value . '</td>';
        }
        $tableGen .= '</tr></table></div><hr>';
        return $tableGen;
    }
}
?>