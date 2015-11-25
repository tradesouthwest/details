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
  <style>form{margin-left: 16px;}.control-label{padding-left: 8px;}</style>
</head>
<body>

<?php include 'nav.php'; ?><div class="clearfix"></div>

<div class="container">
    <div class="row">
        <header class="col-md-12">

<?php

if (isset($_POST['respond'])) {
    $respond_to = filter_var( $_POST['respond_to'], FILTER_SANITIZE_STRING );    // title of article
    $idd_is     = filter_var( $_POST['idd_is'],  FILTER_VALIDATE_INT );         // numeric id of article
} ?>

        <h3 class="page-header"><small>Add Response to: <?php esc( $respond_to ); ?></small></h3>

<?php

if( isset( $_POST['submit_res'] )) {
$idd_is       = filter_var( $_POST['idd_is'],  FILTER_VALIDATE_INT );
$name         = filter_var( $_POST['name'],    FILTER_SANITIZE_STRING ); 
$email        = filter_var( $_POST['email'],   FILTER_VALIDATE_EMAIL );
$respond      = filter_var( $_POST['respond'], FILTER_SANITIZE_STRING ); 
$date_inis    = date( 'm/d/Y H:i' );
$date_respond = filter_var( $date_inis, FILTER_SANITIZE_STRING ); 

require_once 'inc/dbh.php';

    $sql = "INSERT INTO tsw_respond
                    ( idd_is, name, email,  respond, date_respond ) 
            VALUES ( :idd_is, :name, :email, :respond, :date_respond )";

    //Prepare each statement.
    $stmt = $dbh->prepare($sql);

    //Bind the values to the parameters 
    $stmt->bindValue( ':idd_is',   $idd_is );
    $stmt->bindValue( ':name',      $name );
    $stmt->bindValue( ':email',      $email );
    $stmt->bindValue( ':respond',     $respond );
    $stmt->bindValue( ':date_respond', $date_respond );

    //Execute the statement and insert values.
    $inserted = $stmt->execute();
    if( $inserted ){
?>
   <br>
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Data entered</h3>
        </div>    
        <div class="panel-body">
            Response Created Successfully! <br>

            <?php print date('m-d-Y H:m'); ?>

            <p><a href="details.php?id=<?php esc( $idd_is ); ?>" title="back to article" class="btn btn-success">Back to Article</a></p>
        </div>
    </div>            
    <br><div class="clearfix"</div>

        <h3>Cool Results</h3>

        <p>Entry added</p> 
            <a class="btn btn-primary-outline" href="index.php" role="button">View Home Page &larr;</a>

<?php
    }
    else {
        print ( "Please retry" );
        print_r( $inserted->errorInfo() );
    }
}

?>
        </header>
    </div>
</div>

<div class="container">
    <div class="row">
      
        <div class="col-md-7">
            <p><a href="javascript:history.back(0)" title="back to article" class="btn btn-default">Back to Article</a></p>
            <form class="form-horizontal" name="responseform" role="form" 
                    method="post" id="editForm" action="<?php echo $SERVER['PHP_SELF']; ?>">

            <div class="form-group">
                <label for="name" class="control-label">name</label><br>
                
                <input type="text" class="form-control" id="name" name="name" placeholder="required" value="" required>
                
            </div>
            <div class="form-group">
                <label for="email" class="control-label">email</label><br>

                <input type="email" class="form-control" id="email" name="email" placeholder="email" value="" required>
            
            </div>
            <div class="form-group">
                <label for="detail" class="control-label">respond </label><br>

                <textarea name="respond" class="form-control" name="respond"></textarea>

            </div>   
            <div class="form-group">
                <label for="submit">date auto-inserted</label><br>
                <input type="hidden" name="idd_is" value="<?php esc( $idd_is ); ?>">
                <input id="submit"   name="submit_res" type="submit" value="Add Reply" class="btn btn-primary">
                    
            </div>
            </form>  
        </div><!-- ends col-7 -->
            <div class="col-md-5  toppad">
                <figure class="col-lg-4 bordered">
                    <img src="https://placeimg.com/420/380/any/sepia" class="img-responsive" alt="img"/>
                </figure>
                <figure class="col-lg-4 bordered">
                    <img src="https://placeimg.com/420/380/nature/sepia" class="img-responsive" alt="img"/>
                </figure>
                <figure class="col-lg-4 bordered">
                    <img src="https://placeimg.com/420/380/people/sepia" class="img-responsive" alt="img"/>
                </figure>
            </div>

    </div>
</div>
<?php include 'footer.php'; ?>
