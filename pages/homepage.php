<?php
use utility\htmlTags;
class homepage extends utility\page
{
    protected $page;

    public function buildPage($content = '')
    {
        return $this->page .= $content . '<br>';

    }
    public function getHeader()
    {
        if (isset($data)) {
            $header = '<div class="container jumbotron"><center><h3>' . $data . '</h3></center></div>';
        } else {
            $header = ' <div class="container"><center><h1>Welcome to WebBull</h1></center>
                <blockquote><b>Get more done with WebBull!</b><p>Create and Manage todo tasks</p></blockquote>
            </div>';

        }
        return $header;
    }

}

$newPage = new homepage();


$links = '<div class="container">
<h3><a href="index.php?page=accounts&action=all">Show All Accounts</a></h3>
<h3><a href="index.php?page=tasks&action=all">Show All Tasks</a></h3></div>';

$slider = '<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="resources/images/To_Do_List-768x318.png" alt="Todo List" style="width:100%;">
        <div class="carousel-caption">
          <h3>Create a To-Do List</h3>
          <p>Forget the old fashion to do list!</p>
        </div>
      </div>

      <div class="item">
        <img src="resources/images/Todo_List_Post_it.jpg" alt="Stick Notes" style="width:100%; height:360px;">
        <div class="carousel-caption">
          <h3>Clean up your desk</h3>
          <p>Go green with web ToDo List!</p>
        </div>
      </div>
    
      <div class="item">
        <img src="resources/images/Finish_job_early.jpg" alt="Finish Tasks early" style="width:100%; height:360px;">
        <div class="carousel-caption">
          <h3>Finish your tasks early</h3>
          <p>So you can do more of this!</p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>';

$newPage->buildPage($newPage->getHeader());
//$newPage->buildPage($links);
//$newPage->buildPage($actionCenter);
$newPage->buildPage($slider);

$newPage->setHtml($newPage->buildPage());


?>