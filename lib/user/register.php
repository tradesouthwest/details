<?php
//session_start();

include "../../header.php";
$page = 'login';
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

                   <?php include 'tsw_register.php'; ?>

                </div>
            </div>
        </div>

            </div><!-- /.row -->
        </div><!-- /.container -->

<?php include 'footer.php'; ?>