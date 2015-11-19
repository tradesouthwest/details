    <?php if( isset( $_POST['success'])) : ?> <br>
        <div class='panel panel-success'>Information UPDATED to system Successfully!</div> 
    <?php endif; ?>
  
                <div class="det-list-container">
                    <table class="table table-striped table-condensed"> <thead>
                    <tr><th><span>response</span></th>
                        <th><span>unapproved</span></th>
                        <th><span>remove</span></th>
                        <th><span>* = unapproved</span></th>
                        <th><span>name</span></th>
                        <th class="short"><span>email</span></th>
                        <th><span>date in</span></th></tr> </thead><tbody>

<?php
// delete, update functions here
include_once '../inc/dbh.php';
    $sql = "SELECT * FROM tsw_respond";
    $result = $dbh->query($sql);
        // Parse returned data, and displays them
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
?>

<tr>
    <td>
<!--========== edit entry link ==========-->
    <?php // make sure id is an interger
          $idr_int = $row['idr']; if (!filter_var($idr_int, FILTER_VALIDATE_INT) === false) { ?>

    <form action="respond-edit.php" method="POST" name="respond-edit">
    <input type="hidden" name="idr" value="<?php echo $idr_int; ?>">
    <input type="submit" class="det-list-anchor" name="submit_edit" value=" [ @ ] <?php echo("$idr_int"); ?>">
    </form></td> 
    
    <td>
<!--========== unapprove responses ==========-->
    <form action="respond-crud.php" method="POST" id="edit">
    <input type="hidden" name="prv_idr" value="<?php echo $idr_int; ?>">
    <input type="submit" class="det-list-anchor" name="submit_prv_idr" value=" [ * ] <?php echo("$idr_int"); ?>">
    </form></td> 
    
    <td>
<!--========== remove response forever ==========-->
    <form action="respond-crud.php" method="POST" id="edit">
    <input type="hidden" name="rmv_idr" value="<?php echo $idr_int; ?>">
    <input type="submit" class="det-list-anchor text-r" name="submit_rmv_idr" value=" [ - ] <?php echo("$idr_int"); ?>" onClick="return confirm('Are you sure you want to delete item&#63;')">
    </form></td> 

    <td>
<!--========== approve entry to public ==========-->
    <?php if( $row['prv'] == 0 ) : ?>

    <form action="respond-crud.php" method="POST" id="edit">
    <input type="hidden" name="pub_idr" value="<?php echo $idr_int; ?>">
    <input type="submit" name="submit_pub_idr" value=" * [ + make public ]" class="det-list-anchor">
    </form>

    <?php endif; ?></td>
     
    <td><?php print( $row['name'] ); ?></td>
    <td class="short"><?php print( $row['email'] ); ?></td>
    <td><?php print( $row['date_respond'] ); ?></td></tr>
<?php } else { print("No xss Please!</td></tr>"); } ?> 

<?php } ?>
                    </tbody></table>


           </div><!-- ends det-list-container -->