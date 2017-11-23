<?php 
abstract class page 
{
    protected $html;
    public function __construct()
    {
        $this->html .= htmlTags::htmlOpen();
        $this->html .= htmlTags::headOpen();
        $this->html .= '  <title>todo-list</title>
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
        $this->html .= htmlTags::headClose();
        $this->html .= htmlTags::bodyOpen();
        $this->html .= '<nav class="navbar navbar-inverse">
                          <div class="container-fluid">
                            <div class="navbar-header">
                              <a class="navbar-brand" href="index.php?page=homepage">Todo List</a>
                            </div>
                            <ul class="nav navbar-nav">
                              <li class="active"><a href="index.php?page=homepage">Home</a></li>
                              <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Tools <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  <li><a href="index.php?page=todo-list">Todo List</a></li>
                                  <li><a href="index.php?page=upload">Read CSV</a></li>
                                </ul>
                              </li>
                              <li><a href="index.php?page=about">About</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                              <li><a href="index.php?page=signup"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                              <li><a href="index.php?page=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                            </ul>
                          </div>
                        </nav>';
    }
    public function __destruct()
    {
    	$this->html .= htmlTags::bodyClose();
        $this->html .= htmlTags::htmlClose();
        stringFunctions::printThis($this->html);
    }	
}
?>