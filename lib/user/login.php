<?php
session_start();

include '../../header.php';
$page = 'index';
$title= 'TSW-Login';
?>
<title><?php print($title); ?></title>

</head>
<body>

<?php include '../../nav.php'; ?>

<div class="container">
    <div class="row">
        <header class="col-md-12 text-center">
            <h2 class="page-header"><?php esc( $det_moniker ); ?></h2>
        </header>
    </div>
</div>

<div class="container">
    <div class="row">
        <ul class="list-inline text-center">
        <li><a class="btn btn-danger" href="#mylogin" title="pass">Login</a></li>
        <li><a class="btn btn-danger" href="registration.php" title="pass">Register</a></li> 
        <li><a class="btn btn-primary" href="inc/logout.php" title="pass">Log Out</a></li>
        <ul>
            <hr>
                <div class="col-md-12 bordered pad-height pad-width"> 
                    <div class="panel panel-default">
                        <div class="panel-heading" id="mylogin"><h4>Submit Valid Login Info Here:</h4></div>
                            <div class="panel-body"> 
                
                                <?php include 'tsw_mylogin.php'; ?>
                             
                            </div>
                        </div>
                </div>
 
   
        </div><!-- ends row -->
    </div><!-- ends container -->

<?php include 'footer.php'; ?>