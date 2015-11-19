<?php 
/**
 * TSW Details NanoBlog
 * Author: Larry Judd Oliver @tradesouthwest | http://tradesouthwest.com/details
 * Contributors in readme.md file
 * License in LICENSE.md file
 */

include 'header.php'; 
?>

<title>Dev App for Looping Details</title>
</head>
<body>

<?php include 'admin-nav.php'; ?><div class="clearfix"></div>

<div class="container">
    <div class="row">
        <header class="col-md-12 text-center">        
        <h2>details nanoBlog Admin Functions</h2>
        </header>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-2 sm-hidden">
        </div>
        <div class="col-md-8 col-sm-12">
        
<?php
if( isset( $_POST['submit_hexc']) ) {

     require_once '../inc/dbh.php';

    $headcolor = alpha_only( $_POST['headcolor'] );  // alpha_only numbers or letters
    $listcolor = alpha_only( $_POST['listcolor'] );

    // query
    $sql = "INSERT INTO tsw_extend_style ( headcolor, listcolor ) 
                                 VALUES ( :headcolor, :listcolor )";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue( ':headcolor', $headcolor );
    $stmt->bindValue( ':listcolor', $listcolor );
    $inserted = $stmt->execute();
        if( $inserted ) {
?>

        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Data entered</h3>
            </div>    
                <div class="panel-body">
              Styles added <br>
              <?php echo date('m-d-Y H:m'); ?>
            </div>
        </div>            

        <hr><p><form action="index.php#tab3default" method="POST"><input type="button" class='btn btn-success' onclick="submit()" name="success" value="BACK to Theme Admin"></form></p>

<?php
    //redirect('index.php#success');
    //throw errors if not success
        } else {
            print "oops This entry did not process correctly, please try again.";
            echo $stmt . "<br>" . $dbh->error;
            }
$dbh = null;
}
?>

        </div><!-- ends col-8 -->
            <div class="col-md-2 sm-hidden">
            </div>

    </div>
</div>
<?php include 'footer.php'; ?>