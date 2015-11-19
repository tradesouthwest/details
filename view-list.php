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

<?php include 'nav.php'; ?>

<div class="container">
    <div class="row">
        <header class="col-md-12 text-center">
            <h2 class="page-header"><?php esc( $det_moniker ); ?></h2>
        </header>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-2 hidden-sm">
        </div>
        <div class="col-md-8 col-sm-12">

        <h3>Details </h3>
            <div class="det-list-container">
                <table class="table table-striped table-condensed"> <thead>
                    <tr>                       
                        <th><span>view</span></th>
                        <th><span>title</span></th>
                        <th><span>website</span></th>
                        <th><span>date in</span></th></tr> </thead><tbody>

<?php
    $prv_pub = filter_var( 1,  FILTER_VALIDATE_INT);

    // grab all non-private items from db
    require_once 'inc/dbh.php';
    $sql = "SELECT * FROM tsw_details WHERE prv = $prv_pub";
    $result = $dbh->query($sql);

        // Parse returned data
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {

            // check for an interger only
            $idd_int = $row['idd']; if (!filter_var($idd_int, FILTER_VALIDATE_INT) === false) { 
?>

<tr>
    <td><a class="btn btn-default btn-sm" id="btn-link" href="details.php?id=<?php echo $idd_int; ?>" title="view"> view </a></td>   
    <td><?php print( $row['title'] ); ?></td>
    <td><?php print( $row['website'] ); ?></td>
    <td><?php print( $row['date_in'] ); ?></td></tr>
<?php } else { print("No xss Please!"); } ?> 

<?php } ?>
                </tbody></table>
           </div><!-- ends det-list-container -->
        </div>
        <div class="col-md-2 hidden-sm">
        </div>

    </div>
</div>
<?php include 'footer.php'; ?>