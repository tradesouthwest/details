<?php
/**
 * TSW Details NanoBlog
 * Author: Larry Judd Oliver @tradesouthwest | http://tradesouthwest.com/details
 * Contributors in readme.md file
 * License in LICENSE.md file
 */
session_start();
if (!isset($_SESSION['user_session']))
{
header('Location: ../lib/user/login.php');
}

include '../header.php';
$page = "index";
$title= "TSW-Details Admin Control Panel";
?>
<style>.tab-pane{transition: .25s;}body{background: #e1e8e5;}.det-list-container table thead tr th {background: #e1e8e5 !important; }</style>
<title><?php print($title); ?></title>
</head>
<body>

<?php include 'admin-nav.php'; ?><div class="clearfix"></div>

<div class="container">
    <div class="row">

        <header class="col-md-12 text-center">
        <h3 class="page-header">Admin Control Panel <small><?php echo $dver; ?></small></h3>
 <p>Admin only page - Welcome <?php echo $_SESSION['firstname']; ?> <a href='../lib/user/logout.php' class="btn btn-default btn-sm">Logout</a> &nbsp; | &nbsp;  <?php if( isset( $_SESSION['user_session']) ) { esc("You are safely logged in "); } ?></p>
        </header>

    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-2 col-sm-hidden"></div>
        <div class="col-lg-12 col-sm-12">
<?php

if( isset( $_POST['submit_hexc']) ) {
//require_once 'dbh.php';
    $headcolor = alpha_only( $_POST['headcolor'] );  // alpha_only numbers or letters
    $listcolor = alpha_only( $_POST['listcolor'] );
}


?>

        </div><!-- ends col-12 -->
        <div class="col-lg-2 col-sm-hidden"></div>

    </div>
</div>
<?php include 'footer.php'; ?>