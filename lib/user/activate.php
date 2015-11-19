<?php
//session_start();

include "../../header.php";
$page = 'index';
$title= 'TSW-Login';
?>
<title><?php print($title); ?></title>

</head>
<body>

<?php include "../../nav.php"; ?>

<div class="container">
    <div class="row">
        <header class="col-md-12 text-center">
            <h2 class="page-header"><?php esc( $det_moniker ); ?></h2>
        </header>
    </div>
</div>

<div class="container">
    <div class="row">
                <div class="col-lg-12">

<?php
include 'tsw_activate.php';
?>

                   <h1 class="page-header">Registration Complete!<h1>
                   <p>Now you can start <?php echo "$username . $email"; ?></p>
                   <a href="login.php" class="btn btn-success">Get Started Now!</a>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="panel-title text-center">Entertain this Thought</h1>
                </div>
 
                <div class="col-lg-6">
                    <h1 class="section-heading">Details</h1>
                </div>
                
            </div><!-- /.row -->
        </div><!-- /.container -->

<?php include 'footer.php'; ?>
