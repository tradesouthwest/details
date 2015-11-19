    <?php if( isset( $_POST['success'])) : ?> <br>
        <div id="trans_fade" class='panel panel-success'>Information UPDATED to system Successfully!</div> 
    <?php endif; ?>

                <div class="det-list-container">
                    <table class="table table-striped table-condensed"> <thead>
                    <tr><th><span>edit me</span></th>
                        <th><span>privatise</span></th>
                        <th><span>remove</span></th>
                        <th><span>* = private</span></th>
                        <th><span>title</span></th>
                        <th class="short"><span>website</span></th>
                        <th><span>date in</span></th></tr> </thead><tbody>

<?php
// delete, update functions here
include_once '../inc/dbh.php';
    $sql = "SELECT * FROM tsw_details";
    $result = $dbh->query($sql);
        // Parse returned data, and displays them
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
?>

<tr>
    <td>
<!-- edit entry link -->
    <?php // make sure id is an interger
          $idd_int = $row['idd']; if (!filter_var($idd_int, FILTER_VALIDATE_INT) === false) { ?>

    <form action="detail-edit.php" method="POST" id="edit">
    <input type="hidden" name="edit" value="<?php echo $idd_int; ?>">
    <input type="submit" class="det-list-anchor" name="submit_edit" value=" [ @ ] <?php echo("$idd_int"); ?>">
    </form></td> 
    
    <td>
<!-- make entry private -->
    <form action="det-crud.php" method="POST" id="edit">
    <input type="hidden" name="prv_idd" value="<?php echo $idd_int; ?>">
    <input type="submit" class="det-list-anchor" name="submit_prv_idd" value=" [ * ] <?php echo("$idd_int"); ?>">
    </form></td> 
    
    <td>
<!-- remove entry forever -->
    <form action="det-crud.php" method="POST" id="edit">
    <input type="hidden" name="rmv_idd" value="<?php echo $idd_int; ?>">
    <input type="submit" class="det-list-anchor text-r" name="submit_rmv_idd" value=" [ - ] <?php echo("$idd_int"); ?>" onClick="return confirm('Are you sure you want to delete item&#63;')">
    </form></td> 

    <td>
<!-- reset entry to public -->
    <?php if( $row['prv'] == 0 ) : ?>

    <form action="det-crud.php" method="POST" id="edit">
    <input type="hidden" name="pub_idd" value="<?php echo $idd_int; ?>">
    <input type="submit" name="submit_pub_idd" value=" * [ + make public ]" class="det-list-anchor">
    </form>

    <?php endif; ?></td>
     
    <td><?php print( $row['title'] ); ?></td>
    <td class="short"><?php print( $row['website'] ); ?></td>
    <td><?php print( $row['date_in'] ); ?></td></tr>
<?php } else { print("No xss Please!</td></tr>"); } ?> 

<?php } ?>
                    </tbody></table>


           </div><!-- ends det-list-container -->