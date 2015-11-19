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
<style>
.no-wrapcell{ 
    max-width: 350px;
}
</style>
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
  <div class="det-list-container">
<?php

// go if form was submitted. 
if( isset( $_POST['submit_search'] )) {
   
    // grab all related items from db
    require_once 'inc/dbh.php';
    $search=$_POST['search'];
    $query = $dbh->prepare("select * from tsw_details where title LIKE '%$search%' OR detail LIKE '%$search%'  LIMIT 0 , 10");
    $query->bindValue(1, "%$search%", PDO::PARAM_STR);
    $query->execute();
    if (!$query->rowCount() == 0) {
	esc( "Search found :<br/>" );
	esc( "<table class=\"table table-striped table-condensed\">" );	
        esc( "<thead><tr><th>view</th><th>title</th><th>short</th></tr></thead><tbody>" );				
        
        while ($results = $query->fetch()) {
	    ?><tr><td><a href="details.php?id=<?php esc( $results['idd'] ); ?>" title="view"><?php			
            esc( $results['idd'] );
		        esc( "</a></td><td>" );
            esc( $results['title'] );
		        esc( "</td><td class=\"no-wrapcell\">" );
            esc( $results['detail'] );
		        esc( "</td></tr>" );				
        } // ends while loop
	esc( "</tbody></table>" );		
    } else {
    ?> <h3>Nothing found - Try the list below</h3><?php
    }
}
/* from http://tutorial.world.edu/web-development/how-to-create-database-search-mysql-php-script/ */ 
?>  
        </div>
            <div class="det-list-container">
                <h3>Most Recent Entries</h3>
                <table class="table table-condensed"> <thead>
                    <tr>                       
                        <th><span>view</span></th>
                        <th><span>title</span></th>
                        <th><span>author</span></th>
                        <th><span>date in</span></th></tr> </thead><tbody>

<?php
    $prv_pub = filter_var( 1,  FILTER_VALIDATE_INT);

    // grab all non-private items from db
    require_once 'inc/dbh.php';
    $sql = "SELECT * FROM tsw_details WHERE prv = $prv_pub ORDER BY idd DESC LIMIT 20";
    $result = $dbh->query($sql);

        // Parse returned data, and displays them
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {

            $idd_int = $row['idd']; 
            // make sure result is an interger
            if (!filter_var($idd_int, FILTER_VALIDATE_INT) === false) { 
?>

<tr>
    <td><a class="btn btn-default btn-xs" id="btn-link" href="details.php?id=<?php echo $idd_int; ?>" title="view"> view </a></td>   
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