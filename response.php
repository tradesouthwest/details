<hr> 
<div id="responses"> 
    <div class="col-md-12">
        <ol>
<?php
/**
 * responses output here
 */

    // prv is going to be a 1 or 0 (integer)
    $prv_int = (int) 1;
    $idd_is = filter_var( $id, FILTER_VALIDATE_INT ); 

    //require_once 'inc/dbh.php';
    $stmt = $dbh->prepare('SELECT * FROM tsw_respond WHERE idd_is = :idd_is AND prv = :prv_int');
        if( $stmt->execute( array( ':idd_is' => $idd_is, ':prv_int' => $prv_int ) )) {
            // loop all open responses 
            while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
?>
 
            <li class="container" id="respond-panel"> 
            <div class="col-sm-4">
                <p><i class="fa fa-calendar"></i> <time datetime="<?php esc( $row['date_respond'] ); ?>" class="date-response"><?php esc( $row['date_respond'] ); ?></time></p>
                <p><i class="fa fa-user"></i> <?php esc( $row['name'] ); ?></p>
            </div>
                <div class="col-sm-8 pull-right"> 
                    <div class="detail-item-respond">
                            
                        <p><?php esc( $row['respond'] ); ?></p>
                        
                    </div> 
                </div>
            </li>

                    

<?php  
    }
} else { print("Could not find any responses"); }
?> 
        </ol>
    </div>
</div><!-- <div class="clearfix"></div> -->
