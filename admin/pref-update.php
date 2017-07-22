<?php 
session_start();
if (!isset($_SESSION['user_session']))
{
header('Location: ../lib/user/login.php');
}

include 'header.php'; ?>
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
if( isset( $_POST['submit_pref'] )){

$ids          = (int)$_POST['ids'];
$theme_url    = $_POST['theme_url'];
$server_email = $_POST['server_email'];
$det_name     = $_POST['det_name'];
$det_moniker  = $_POST['det_moniker'];
$readlink     = $_POST['readlink'];
$private      = $_POST['private'];
$theme        = $_POST['theme'];
$paginate     = $_POST['paginate'];

require_once '../inc/dbh.php';

// Insert Updated data into mysql
$sql = ("UPDATE tsw_settings
         SET 
         `theme_url`    = :theme_url, 
         `server_email` = :server_email, 
         `det_name`     = :det_name, 
         `det_moniker`  = :det_moniker, 
         `readlink`  = :readlink, 
         `private`   = :private, 
         `theme`     = :theme, 
         `paginate`  = :paginate 
         WHERE `ids` = :ids");

//Prepare UPDATE SQL statement.
$statement = $dbh->prepare($sql);
//Bind value to the parameter :id.
$statement->bindValue(':ids', $ids);

$statement->bindValue(':theme_url',   $theme_url);
$statement->bindValue(':server_email', $server_email);
$statement->bindValue(':det_name',     $det_name);
$statement->bindValue(':det_moniker',  $det_moniker);
$statement->bindValue(':readlink',    $readlink);
$statement->bindValue(':private',    $private);
$statement->bindValue(':theme',     $theme);
$statement->bindValue(':paginate', $paginate);

$update = $statement->execute();
    
    //If the process is successful.
    if($update){
  echo "<br>Information UPDATED to system Successfully!";
        echo "<BR>";
        echo "Data entered - "; 
        $source = $dateformat;
        $date = new DateTime($source);
        echo $date->format('m-d-Y H:m');
echo "<hr>"; ?>
    <br>
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Data entered</h3>
        </div>    
        <div class="panel-body">
            Details site preferences updated Successfully! <?php esc( $prv_idd ); ?><br>
            <?php echo date('m-d-Y H:m'); ?>
        </div>
    </div>            
    <br>
        <hr><p><form action="index.php#tab4default" method="POST"><input type="button" class='btn btn-success' onclick="submit()" name="success" value="BACK to Details List"></form></p> 

<?php
        // throw errors if not success
        } else {
            print "oops This entry did not process correctly, please try again.";
            echo $sql . "<br>" . $dbh->error;
            }
}
?>

        </div>
        <div class="col-md-2 sm-hidden">
        </div>

    </div>
</div>
<?php include 'footer.php'; ?>
