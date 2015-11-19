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
/**
 * ********** received a submit to make entry private **********
 * 
 */
if( isset( $_POST['submit_prv_idd'] ) ){
    $prv_idd = $_POST['prv_idd'];
    $prv = (int)0;

    require '../inc/dbh.php';

    $stmt = $dbh->prepare("UPDATE tsw_details 
                           SET prv = :prv 
                           WHERE idd = :idd
                          ");
    $stmt->bindValue(':idd', $prv_idd);
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
            Article Made Private Successfully! <?php esc( $prv_idd ); ?><br>
            <?php echo date('m-d-Y H:m'); ?>
        </div>
    </div>            
    <br>

<hr><p><form action="index.php#tab1default" method="POST"><input type="button" class='btn btn-success' onclick="submit()" name="success" value="BACK to Details List"></form></p>

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
 * ********** make entry public again  **********
 * 
 */

if( isset( $_POST['submit_pub_idd'] ) ){
    $pub_idd = $_POST['pub_idd'];
    $prv = (int)1;

    require_once '../inc/dbh.php';

    $sql = "UPDATE tsw_details 
            SET prv=?
            WHERE idd=?";
    $update = $dbh->prepare($sql);
    $update->execute(array($prv,$pub_idd));
        if($update){
?>

    <br>
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Data changed to PUBLIC</h3>
        </div>    
        <div class="panel-body">
            Information UPDATED to PUBLIC status Successfully! <?php esc( $pub_idd ); ?><br>
            <?php echo date('m-d-Y H:m'); ?>
        </div>
    </div>
        <hr>
        <p><form action="index.php#tab1default" method="POST"><input type="button" class='btn btn-success' onclick="submit()" name="success" value="BACK to Details List"></form></p>
    
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

if( isset( $_POST['submit_rmv_idd'] ) ){
    $rmv_idd = $_POST['rmv_idd'];
    require_once '../inc/dbh.php';

    $sql = "DELETE from tsw_details 
            WHERE idd=?";
    $delete = $dbh->prepare($sql);
    $delete->execute(array($rmv_idd));
        if($delete){
?> 

     <br>
    <div class="panel panel-danger">
        <div class="panel-heading">
            <h3 class="panel-title">Deleted Entry</h3>
        </div>    
        <div class="panel-body">
            Information DELETED Successfully! <br>
            <?php echo date('m-d-Y H:m'); ?>
        </div>
    </div>    
    <br>

<hr><p><form action="index.php#tab1default" method="POST"><input type="button" class='btn btn-success' onclick="submit()" name="success" value="BACK to Details List"></form></p>

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
<?php

        /**
         * process how many articles per page count
         * @row paginate, @row ids
         * pseudo-naming parameter marker `ids` twice to 
         * avoid "emulation Mode" conflicts (@PDO::ATTR_EMULATE_PREPARES)
         */
        if( isset( $_POST['submit_pagi'] )) {
            $ids      = filter_var( $_POST['ids'], FILTER_VALIDATE_INT );
            $idss     = filter_var( $_POST['ids'], FILTER_VALIDATE_INT );
            $paginate = filter_var( $_POST['paginate'], FILTER_VALIDATE_INT );

            require_once '../inc/dbh.php';

            $stmt = $dbh->prepare("UPDATE tsw_settings 
                                   SET paginate = :paginate  
                                   WHERE ids    = :ids
                                  ");
            $stmt->bindValue(':paginate', $paginate);
            $stmt->bindValue(':ids', $ids);               
                if ($stmt->execute()) 
                {

                // grab the new paginate value
                $stmt = $dbh->prepare("SELECT paginate 
                                       FROM tsw_settings 
                                       WHERE ids = :idss
                                      "); 
                $stmt->bindValue(':idss', $idss);
                $stmt->execute();
                    if ($stmt->rowCount() > 0){
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $paginate = $row['paginate'];
                    }
?>
        
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Data entered</h3>
            </div>    
                <div class="panel-body">
                    Pagination Updated Successfully! <?php esc( $paginate ); ?> Articles per page<br>
                    <?php echo date('m-d-Y H:m'); ?>
                </div>
        </div>    
            <hr>
                <p><form action="index.php#tab3default" method="POST"><input type="button" class='btn btn-success' onclick="submit()" name="success" value="BACK to Details List"></form></p>
        
        <?php
        } else {
        ?>
        
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">Data entered</h3>
            </div>    
                <div class="panel-body">
                    Pagination did not update - try again please. <br>
                    <?php echo date('m-d-Y H:m'); ?>
                </div>
            </div>   
                <hr>
                    <p><form action="index.php#tab3default" method="POST"><input type="button" class='btn btn-success' onclick="submit()" name="success" value="BACK to Details List"></form></p>
         
        <?php
        }
$dbh = null;
    }
?>
<?php
/**
 * ********** received a submit to make comments private **********
 * 
 */

if( isset( $_POST['submit_noreply'] ) ){
    $noreply = filter_var($_POST['noreply'], FILTER_VALIDATE_INT );
    $ids     = filter_var($_POST['ids'],     FILTER_VALIDATE_INT );
    
    require '../inc/dbh.php';

    $stmt = $dbh->prepare("UPDATE tsw_settings 
                           SET noreply = :noreply 
                           WHERE ids = :ids 
                          ");
    $stmt->bindValue(':noreply', $noreply);
    $stmt->bindValue(':ids', $ids);
    $stmt->execute();
        if($stmt){
?>
    
    <br>
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Data entered</h3>
        </div>    
        <div class="panel-body">
            Responses Turned Off Successfully!<br>
            <?php echo date('m-d-Y H:m'); ?>
        </div>
    </div>            
    <br>

<hr><p><form action="index.php#tabdefault" method="POST"><input type="button" class='btn btn-success' onclick="submit()" name="success" value="BACK to Dashboard"></form></p>

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
 * ********** received a submit to reorder sort articles by **********
 * 
 */
if( isset( $_POST['submit_sortby'] ) ){
    $sortby = filter_var( $_POST['sortby'], FILTER_VALIDATE_BOOLEAN );
    $ids    = filter_var( $_POST['ids'],    FILTER_VALIDATE_INT );
    
    require '../inc/dbh.php';

    $stmt = $dbh->prepare("UPDATE tsw_settings 
                           SET sortby = :sortby 
                           WHERE ids = :ids
                          ");
    $stmt->bindValue(':sortby', $sortby);
    $stmt->bindValue(':ids', $ids);
    $stmt->execute();
        if($stmt){
?>
    
    <br>
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Data entered</h3>
        </div>    
        <div class="panel-body">
            Sort Order Changed Successfully!<br>
            <?php echo date('m-d-Y H:m'); ?>
        </div>
    </div>            
    <br>

<hr><p><form action="index.php#tabdefault" method="POST"><input type="button" class='btn btn-success' onclick="submit()" name="success" value="BACK to Dashboard"></form></p>

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