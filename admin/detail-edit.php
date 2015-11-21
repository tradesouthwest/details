<?php 
/**
 * TSW Details NanoBlog
 * Author: Larry Judd Oliver @tradesouthwest | http://tradesouthwest.com/details
 * Contributors in readme.md file
 * License in LICENSE.md file
 */

include 'header.php'; 
?>

    <link type="text/css" rel="stylesheet" href="../lib/jtedit/jquery-te-1.4.0.css">
    <style>textarea{margin-left: 0;}label[for=detail]{padding-left: 20px;}</style>
    <script type="text/javascript" src="../lib/jtedit/jquery-te-1.4.0.min.js" charset="utf-8"></script>

<title>Admin Details NanoCMS</title>
</head>
<body>

<?php include 'admin-nav.php'; ?><div class="clearfix"></div>

<div class="container">
    <div class="row">
        <header class="col-md-12 text-center">
            <h2>Your Are Editing</h2>
        </header>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-2 sm-hidden">
        </div>
        <div class="col-md-8 col-sm-12">
        
<?php
if( isset( $_POST['submit_edit'] )){

    require_once '../inc/dbh.php';
    $stmt = $dbh->prepare("SELECT * FROM tsw_details WHERE idd = ?");

    if( $stmt->execute( array($_POST['edit']) )) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

          
                <form enctype="multipart/form-data" action="det-update.php" name="editform" id="editForm" method="POST">

                    <p><label for="title">title </label> <small class="text-muted"> id <?php echo $row['idd']; ?></small><br>
                      <input class="form-control" name="title" type="text" value="<?php echo $row['title']; ?>" ></p>


                    <label for="detail">detail</label><br>
<!-- ============ WYSIWYG Editor -->                
                    <textarea class="jqte-text" name="detail"><?php esc( $row['detail'] ); ?></textarea>
<script>

/** calls the jquery text editor script
 *  class name is assignable to textarea
 */
    $('.jqte-text').jqte(); 

</script>
                    <p><label for="website">website</label><br>
                      <input class="form-control" name="website" type="url" value="<?php esc( $row['website'] ); ?>"></p>

                    <p><label for="dev_url">link to image or alt site</label><br>
                      <input class="form-control" name="dev_url" type="text" value="<?php esc( $row['dev_url'] ); ?>"></p>

                    <p><label for="note">note</label><br>
                      <input class="form-control" name="note" type="text" value="<?php esc( $row['note'] ); ?>"</p>

                    <p><label for="date_in">date_in </label><small> you may change this if important</small><br>
                      <input class="form-control" name="date_in" type="text" value="<?php esc( $row['date_in'] ); ?>"></p>

                    <p><label for="prv">Private</label><br>

                    <?php $checked = $row['prv']; ?> 
                      <input name="prv" type="radio" <?php if (isset($checked) && $checked=="0") esc( "checked" ); ?> value="0"> Yes &nbsp; | &nbsp; <input name="prv" type="radio" <?php if (isset($checked) && $checked=="1") esc( "checked" ); ?> value="1"> No
                      
                    <hr>
                      <input name="stat" type="hidden" value="<?php esc( $row['stat'] ); ?>">
                      <input name="idd" type="hidden" value="<?php esc( $row['idd'] ); ?>">

                    <p><label for="update">Update Edit</label><br>
                      <input name="update" type="submit" value="Update" class="btn btn-success"></p>
                </form>
                    <p class="pull-right"><a href="index.php" title="back to admin" class="btn btn-danger">Cancel/Back to Admin</a></p>
        

<?php  

    } else { print("Could not get id of item"); }
}
?> 

        </div>
        <div class="col-md-2 sm-hidden">
        </div>

    </div>
</div>
<?php include 'footer.php'; ?>
