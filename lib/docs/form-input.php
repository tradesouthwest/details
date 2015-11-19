<?php
/**
 * TSW Details NanoBlog
 * Author: Larry Judd Oliver @tradesouthwest | http://tradesouthwest.com/details
 * Contributors in readme.md file
 * License in LICENSE.md file
 */
 // documentation is not supported as of November 2015 - coming soon
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://tradesouthwest.com/dev/details/theme-style.css">
  <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<style>

body{
    font-family: 'Lato', sans-serif;
    background-color: rgb(255, 255, 255);
    margin-top: 50px;
    font-size: inherit;
    font-size: 1em;
    font-size: 16px;
}.form-control label{min-width:220px;}</style>
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style>.tab-pane{transition: .7s;}body{background: #e1e8e5;}.page-header{}</style>
<title>TSW-Details Admin Control Panel</title>
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="../lib/img/tsw-logoem.png" /></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav grad-menu">
<div class="btn-group btn-group-sm list-inline" id="admin-nav-top">
            <li><a class="btn btn-default" href="../index.php" title="forms">Read Articles</a></li>
            <li><a class="btn btn-default" href="form-in.php" title="forms">Write Article</a></li>
            <li><a class="btn btn-default" href="admin-list.php" title="forms">List Articles</a></li>
            <li><a class="btn btn-default" href="index.php" title="lists">Config</a></li>
</div>
        </ul>
            <h1 id="nav-header-title" class="nopadding">Details NanoBlog</h1>
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav><div class="clearfix"></div>

<div class="container">
    <div class="row">

        <header class="col-md-12 text-center">
        <h3 class="page-header">Admin Control Panel</h3>
 <p>Admin only page - Welcome Larry <a href='../lib/user/logout.php' class="btn btn-default btn-sm">Logout</a> &nbsp; | &nbsp;  You are safely logged in </p>
        </header>
        <div class="col-sm-3">
            <ol class="list-group list-unstyled">
            <li class="list-group-item"><a href="#chptr1" title="doc" class="btn btn-link">Overview</a></li>
 <li class="list-group-item"><a href="#chptr1" title="doc" class="btn btn-link">Overview</a></li>
 <li class="list-group-item"><a href="#chptr1" title="doc" class="btn btn-link">Overview</a></li>
 <li class="list-group-item"><a href="#chptr1" title="doc" class="btn btn-link">Overview</a></li>
 <li class="list-group-item"><a href="#chptr1" title="doc" class="btn btn-link">Overview</a></li>
<li class="list-group-item"><a href="#chptr1" title="doc" class="btn btn-link">Overview</a></li>
<li class="list-group-item"><a href="#chptr1" title="doc" class="btn btn-link">Overview</a></li>
<li class="list-group-item"><a href="#chptr1" title="doc" class="btn btn-link">Overview</a></li>
<li class="list-group-item"><a href="#chptr1" title="doc" class="btn btn-link">Overview</a></li>
            </ol>
        </div>
        
        <div class="col-sm-9">
        <div class="det-docs">

            <header id="chptr2"><h2 class="page-header">New Entry</h2></header>
<p>Documents are created using HTML "detail list" tag. <br><em>See: </em> <a href="http://www.w3schools.com/tags/tag_dl.asp" title="tags" target="_blank">http://www.w3schools.com/tags/tag_dl.asp</a> for more information on 'dl' tag.</p>
<hr>
<form class="form-horizontal" role="form" method="post" action="contact.php">
                <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Top Title</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="dmdt" name="dmdt" placeholder="First & Last Name" value="">
                    </div>
                </div>
              
                <div class="form-group">
                <label for="message" class="col-sm-3 control-label">Entry</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" rows="4" name="message"></textarea>
                    </div>
                </div>
                <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Footnote </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="dmref" name="dmref" placeholder="*cited from" value="">
                    </div>
                </div>
                 <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Enter and add a new entry </label>
                    <div class="col-sm-9">
                        <input id="submit" name="submit" type="submit" value="Enter" class="btn btn-primary">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                    <p>get list of existing d-lists</p>

<?php
// will use HTML dl (detail list) for building chapters
$dmdl = "one";
$dmdt = "title";
$dmdd = "content";

$array = array(
    $dmdl => "Chptr 1",
    $dmdt => "Chptr 2",
    $dmdd => "Chptr3",
);

// create html template for table
$list_template = ['<select>','<option value="','">','</option>', '</select>' ];

// select by associative array

	$output = '<select>';
                        foreach($array as $key => $value)
	{
		$output .= "<option value='$key'>$value</option>";
	}
	
	$output .= '</select>';
	echo $output;

	?>
<br><hr>
<?php

	$output2 = $model[0];
	foreach($array as $key => $value)
	{
		$output2 .= $model[1] . $key . $model[2] . $value . $model[3] . '<br>';
	}
	
	$output2 .= $model[4];
	echo $output2;

?>
                    </div>
                </div>
                </form>  


        </div>



        </div><!--ends col-9-->
    </div>
</div>
<div class="container">
    <div class="row">
        <footer class="col-md-12 text-center">
            <a href="#" class="btn btn-default" title="top of page">Top</a>
        </footer>
    </div>
</div>
</body>
</html>
