<?php include 'header.php'; ?>
<title>Dev App for Looping Details</title>
</head>
<body>
<?php include 'admin-nav.php'; ?>
<div class="clearfix"></div>
<div class="container">
    <div class="row">
        <header class="col-md-12 text-center">
        
        <h2>How flexible it is</h2>
        </header>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-2 sm-hidden">
        </div>
        <div class="col-md-8 col-sm-12">
        
<?php
/**
 * ********** received a submit to unapprove response **********
 * 
 */
if( isset( $_POST['submit_prv_idr'] ) ){
$prv_idr = $_POST['prv_idr'];
$prv = (int)0;

require '../inc/dbh.php';

$stmt = $dbh->prepare("UPDATE tsw_respond 
        SET prv = :prv WHERE idr = :idr");
$stmt->bindValue(':idr', $prv_idr);
$stmt->bindValue(':prv', $prv);
$stmt->execute();
    if($stmt){
?>
    
    <br>
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Data entered</h3>
        </div>    
        <div class="panel-body">
            Response Unapproved Successfully! <?php esc( $prv_idr ); ?><br>
            <?php   
                echo date('m-d-Y H:m');
            ?>
        </div>
    </div>            
    <br>

<hr><p><form action="index.php#tab2default" method="POST"><input type="button" class='btn btn-success' onclick="submit()" name="success" value="BACK to Responses List"></form></p>

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
<?php
/**
 * ********** make response public again  **********
 * 
 */

if( isset( $_POST['submit_pub_idr'] ) ){
$pub_idr = $_POST['pub_idr'];
$prv = (int)1;

require_once '../inc/dbh.php';

$sql = "UPDATE tsw_respond 
        SET prv=?
        WHERE idr=?";
$update = $dbh->prepare($sql);
$update->execute(array($prv,$pub_idr));
    if($update){
?>

    <br>
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Data changed to PUBLIC</h3>
        </div>    
        <div class="panel-body">
            Information UPDATED to PUBLIC status Successfully! <?php esc( $pub_idr ); ?><br>
            <?php   
            echo date('m-d-Y H:m');
            ?>
        </div>
    </div>
        <hr>
        <p><form action="index.php#tab2default" method="POST"><input type="button" class='btn btn-success' onclick="submit()" name="success" value="BACK to Responses List"></form></p>
    
<?php
        // redirect('index.php#success');
        // throw errors if not success
        } else {
            print "oops This entry did not process correctly, please try again.";
            echo $sql . "<br>" . $dbh->error;
            }
$dbh = null;
}
?>
<?php
/**
 * ********** process delete post **********
 *
 */

if( isset( $_POST['submit_rmv_idr'] ) ){
$rmv_idr = $_POST['rmv_idr'];
require_once '../inc/dbh.php';

$sql = "DELETE from tsw_respond 
        WHERE idr=?";
$delete = $dbh->prepare($sql);
$delete->execute(array($rmv_idr));
    if($delete){
?> 

     <br>
    <div class="panel panel-danger">
        <div class="panel-heading">
            <h3 class="panel-title">Deleted Entry</h3>
        </div>    
        <div class="panel-body">
            Information DELETED Successfully! <br>
            <?php 
            echo date('m-d-Y H:m');
            ?>
        </div>
    </div>    
    <br>

<hr><p><form action="index.php#tab2default" method="POST"><input type="button" class='btn btn-success' onclick="submit()" name="success" value="BACK to Details List"></form></p>

<?php 
        // redirect('index.php');
        // throw errors if not success
        } else {
            print "oops This entry did not process correctly, please try again.";
            echo $sql . "<br>" . $dbh->error;
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