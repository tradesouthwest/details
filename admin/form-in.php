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

<title>Dev App for Looping Details</title>
</head>
<body>

<?php include 'admin-nav.php'; ?><div class="clearfix"></div>

<div class="container">
    <div class="row">
        <header class="col-md-12 text-center">
        <h3 class="page-header">Input New Details</h3>

<?php

if( isset ( $_POST['submit_new']) ) {
$title     = $_POST['title'];
$website   = $_POST['website'];
$detail    = $_POST['detail'];
$dev_url   = $_POST['dev_url'];
$note      = $_POST['note'];
$prv       = $_POST['prv'];
$date_inis = date('m/d/Y H:i');
$date_in   = $date_inis;

require_once '../inc/dbh.php';

    $sql = "INSERT INTO tsw_details 
                    ( title, website,  detail,  dev_url,  note,  prv,  date_in ) 
            VALUES ( :title, :website, :detail, :dev_url, :note, :prv, :date_in )";

    //Prepare our statement.
    $stmt = $dbh->prepare($sql);

    //Bind the values to the parameters 
    $stmt->bindValue(':title',   $title);
    $stmt->bindValue(':website',$website);
    $stmt->bindValue(':detail',  $detail);
    $stmt->bindValue(':dev_url', $dev_url);
    $stmt->bindValue(':note',    $note);
    $stmt->bindValue(':prv',     $prv);
    $stmt->bindValue(':date_in', $date_in);

    //Execute the statement and insert our values.
    $inserted = $stmt->execute();
    if( $inserted ){
?>
   <br>
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Data entered</h3>
        </div>    
        <div class="panel-body">
            Article Created Successfully! <br>

            <?php print date('m-d-Y H:m'); ?>

            <p><form action="index.php" method="POST"><input type="button" class='btn btn-success' onclick="submit()" name="success" value="BACK to Home Page"> </form> </p>
            <span> <form action="form-in.php#" method="POST"><input type="button" class='btn btn-success' onclick="submit()" name="rewrite" value="Write Another Entry"></form></span></p>
        </div>
    </div>            
    <br><div class="clearfix"</div>

        <h3>Cool Results</h3>

        <p>Entry "<?php esc( $title ); ?>" added</p> 
            <a class="btn btn-primary-outline" href="index.php" role="button">View Home &larr;</a>

<?php  
    } else { print ( "Please retry" ); print_r($inserted->errorInfo()); }
}
?>
        </header>
    </div>
</div>


<div class="container">
    <div class="row">
      
        <div class="col-md-6">
            <h3>Editor</h3>
            <form enctype="multipart/form-data" class="form-horizontal" role="form" 
                    method="post" id="editForm" action="<?php echo $SERVER['PHP_SELF']; ?>">
               
                <div class="form-group">
                    <label for="detail">detail </label><br>

<!-- ============ WYSIWYG Editor -->                
                    <textarea name="textarea" class="jqte-text" name="detail"></textarea>
<script>

/** calls the jquery text editor script
 *  class name is assignable to textarea
 */
    $('.jqte-text').jqte(); 

</script>
                </div>   
        </div>

        <div class="col-md-6">
        <h3>Meta Entry</h3>
            <div class="form-group">
                <label for="title" class="control-label">title</label><br>
                
                <input type="text" class="form-control" id="title" name="title" placeholder="required" value="" required>
                
            </div>
            <div class="form-group">
                <label for="website" class="control-label">website</label><br>

                <input type="url" class="form-control" id="website" name="website" placeholder="http://abcdefg.com" value="">
            
            </div>
            <div class="form-group">
                <label for="note" class="control-label">author or note</label><br>

                <input type="text" class="form-control" id="note" name="note" placeholder="author or footnotes">

            </div>
            <div class="form-group">
                <label for="dev_url" class="control-label">dev_url</label><br>
                   
                <input type="text" class="form-control" id="dev_url" name="dev_url" placeholder="linkback url or references">
                   
            </div>
            <div class="form-group">
                <label for="prv">Private: &nbsp; <?php $checked = $row['prv']; ?> 
                <input name="prv" type="radio" <?php if (isset($checked) && $checked=="0") esc( "checked" ); ?> value="0"> Yes &nbsp; | &nbsp; <input name="prv" type="radio" checked <?php if (isset($checked) && $checked=="1") esc( "checked" ); ?> value="1"> No </label>
            </div>          
            <div class="form-group">
                <label for="submit">date auto-inserted</label><br>

                <input id="submit" name="submit_new" type="submit" value="Add New" class="btn btn-primary">
                    
            </div>
            </form>  
        </div><!-- ends col-6 -->

    </div>
</div>
<?php include 'footer.php'; ?>
