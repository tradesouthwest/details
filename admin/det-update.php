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
if( isset( $_POST['update'] )){

$idd     = (int)$_POST['idd'];
$title   = $_POST['title'];
$website = $_POST['website'];
$detail  = $_POST['detail'];
$dev_url = $_POST['dev_url'];
$note    = $_POST['note'];
$date_in = $_POST['date_in'];
$prv     = $_POST['prv'];
$stat    = $_POST['stat'];

require_once '../inc/dbh.php';

// Insert data into mysql
$sql = ("UPDATE tsw_details 
         SET 
         `title` = :title, `website` = :website, `detail` = :detail, `dev_url` = :dev_url, `note` = :note, `date_in` = :date_in, `prv` = :prv, `stat` = :stat 
         WHERE `idd` = :idd");

//Prepare UPDATE SQL statement.
$statement = $dbh->prepare($sql);
//Bind value to the parameter :id.
$statement->bindValue(':idd', $idd);

$statement->bindValue(':title',   $title);
$statement->bindValue(':website', $website);
$statement->bindValue(':detail',  $detail);
$statement->bindValue(':dev_url', $dev_url);
$statement->bindValue(':note',    $note);
$statement->bindValue(':date_in', $date_in);
$statement->bindValue(':prv',     $prv);
$statement->bindValue(':stat',    $stat);

$update = $statement->execute();
    
    //If the process is successful.
    if($update){
  echo "<br>Information UPDATED to system Successfully!";
        echo "<BR>";
        echo "Data entered - "; 
        $source = $dateformat;
        $date = new DateTime($source);
        echo $date->format('m-d-Y H:m');
echo "<hr><p><a class='btn btn-primary' href='index.php' title='back'>BACK to Details List</a></p>"; 
    
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