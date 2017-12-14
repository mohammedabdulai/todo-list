<?php
namespace utility;
use utility;
abstract class page
{
    protected $html;
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->html .= htmlTags::htmlOpen();
        $this->html .= htmlTags::headOpen();
        $this->html .= '<title>todo-list</title>
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">';
        $this->html .= htmlTags::headClose();
        $this->html .= htmlTags::bodyOpen();
        if(!isset($_SESSION['login']))
        {
            $this->html .= '<nav class="navbar navbar-inverse">
                          <div class="container-fluid">
                            <div class="navbar-header">
                              <a class="navbar-brand" href="index.php?page=homepage">WebBull</a>
                            </div>
                            <ul class="nav navbar-nav">
                              <li class="active"><a href="index.php?page=homepage">Home</a></li>
                              <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Tools <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  <li><a href="index.php?page=tasks&action=all">Todo List</a></li>
                                  <li><a href="index.php?page=upload&action=show">Read CSV</a></li>
                                </ul>
                              </li>
                              <li><a href="index.php?page=about">About</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                              <li><a href="index.php?page=accounts&action=create"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                              <li><a href="index.php?page=accounts&action=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                            </ul>
                          </div>
                        </nav>';
        }
        else{
            $this->html .= '<nav class="navbar navbar-inverse">
                          <div class="container-fluid">
                            <div class="navbar-header">
                              <a class="navbar-brand" href="index.php?page=homepage">WebBull</a>
                            </div>
                            <ul class="nav navbar-nav">
                              <li class="active"><a href="index.php?page=homepage">Home</a></li>
                              <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Tools <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  <li><a href="index.php?page=tasks&action=all">Todo List</a></li>
                                  <li><a href="index.php?page=upload&action=show">Read CSV</a></li>
                                </ul>
                              </li>
                              <li><a href="index.php?page=about">About</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                              <li><a href="index.php?page=accounts&action=profile"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                              <li><a href="index.php?page=accounts&action=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                            </ul>
                          </div>
                        </nav>';
        }
    }

    public function setHtml($html)
    {
        $this->html .= $html;
    }

    public function getHtml()
    {
        return $this->html;
    }
    public function __destruct()
    {
        /*$this->html .= '<script type="text/javascript">
        $(document).ready(function(){
            $(".btn").click(function(){
                //$(this).submit();
                $(this).button("loading").delay(500).queue(function(){
                    $(this).button("reset");
                    $(this).dequeue();    
                }); 
            });   
        });
        </script>';*/
        //Bootstrap Scripts
         $this->html .='<script>
                            function goBack() {
                                window.history.back();
                            }
                         </script>';
        $this->html .= '<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>';
    	$this->html .= htmlTags::bodyClose();
        $this->html .= htmlTags::htmlClose();
        stringFunctions::printThis($this->html);
    }	
}
?>