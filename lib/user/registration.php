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
            <h1 class="page-header"><?php esc( $det_moniker ); ?></h1>
        </header>
    </div>
</div>

<div class="container">
    <div class="row">
                <div class="col-md-6">
                   <?php include 'tsw_registration.php'; ?>
                </div>
                <div class="col-md-6">
                    <h2>Registration information</h2>
                    <h5 class="panel-title text-center">More Info goes here</h5>
                </div>

            </div><!-- /.row -->
        </div><!-- /.container -->
<div class="clearfix"><hr></div>
<?php include 'footer.php'; ?>