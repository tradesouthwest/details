<?php
/**
 * TSW Details NanoBlog
 * theme and page settings
 */

require_once '../inc/dbh.php';
?>

<!-- ========== First Column of Panels ========== -->
<div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading"><h4>Total Status</h4></div>
            <div class="panel-body">

<?php
/** get the page count
 * total pages in blog
 * @row idd
 */
    $sql = ("SELECT count(*) FROM tsw_details");
    $result = $dbh->prepare($sql); 
    $result->execute(); 
    $number_of_rows = $result->fetchColumn(); 

?><i class="fa fa-bullhorn"></i> <?php esc( $number_of_rows ); ?> - Entry Total (including private)
            </div><!--/panel-body-->
    </div><!--/panel-->   

    <div class="panel panel-default">
        <div class="panel-heading"><h4>Respond Count</h4></div>
            <div class="panel-body">

<?php
/** get the page count
 * total pages in blog
 * @row idd
 */
    $prv = (int)1;
    $sql = ("SELECT count(*) FROM tsw_respond WHERE prv = :prv");
    $result = $dbh->prepare($sql); 
    $result->bindValue(':prv', $prv);
    $result->execute(); 
    $number_of_rows = $result->fetchColumn(); 
?>

                <i class="fa fa-comments-o"></i> <?php esc( $number_of_rows ); ?> - Total responses
            </div><!--/panel-body-->
    </div><!--/panel-->  

    <div class="panel panel-default">
        <div class="panel-heading"><h4>Toggle Responses</h4></div>
            <div class="panel-body">

<!-- ============ process response on or off -->
<?php 
    // grab the value of noreply state
    $sql = "SELECT ids, noreply FROM tsw_settings";
    $result = $dbh->query($sql);
         
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $noreply_state = $row['noreply'];
    $ids           = $row['ids'];
} 
?> 

            <form name="noreply" action="det-crud.php" method="POST">
                <div class="form-group">
                    <label for="noreply" aria-describedby="helpBlock2">Do NOT Display Responses </label><br>
                        
                    <div class="well" id="noreply_radio">
                        <?php $is_checked = $noreply_state; ?>

                        <i class="fa fa-ban text-danger"></i><input name="noreply" type="radio" value="1" 
                        <?php if (isset($is_checked) && $is_checked=="1") esc( "checked" ); ?>> &nbsp; Yes &nbsp; | &nbsp; 
                        <i class="fa fa-comments"></i><input name="noreply" type="radio" value="0" 
                        <?php if (isset($is_checked) && $is_checked=="0") esc( "checked" ); ?>> No 

                     </div>
                     <span id="helpBlock2" class="help-block">Checking Yes makes all Responses hidden to public view. <small>Default is No.</small></span>
                </div>

                <div class="form-group">
                     <input type="hidden" name="ids" value="<?php esc( $ids ); ?>">
                     <input type="submit" name="submit_noreply" class="btn btn-danger">
                </div>

            </form>
            </div><!--/panel-body-->
    </div><!--/panel-->  

</div>

<!-- ========== Second Column of Panels ========== -->
<div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading"><h4>Total Status</h4></div>
            <div class="panel-body">

<?php
/** get the page count
 * total pages in blog
 * @row idd
 */
    $sql = ("SELECT count(*) FROM tsw_details");
    $result = $dbh->prepare($sql); 
    $result->execute(); 
    $number_of_rows = $result->fetchColumn(); 

?><i class="fa fa-bullhorn"></i> <?php esc( $number_of_rows ); ?> - Entry Total (including private)
            </div><!--/panel-body-->
    </div><!--/panel-->   

    <div class="panel panel-default">
        <div class="panel-heading"><h4>Respond Count</h4></div>
            <div class="panel-body">

<?php
/** get the page count
 * total pages in blog
 * @row idd
 */
    $prv = (int)1;
    $sql = ("SELECT count(*) FROM tsw_respond WHERE prv = :prv");
    $result = $dbh->prepare($sql); 
    $result->bindValue(':prv', $prv);
    $result->execute(); 
    $number_of_rows = $result->fetchColumn(); 
?><i class="fa fa-comments-o"></i> <?php esc( $number_of_rows ); ?> - Total responses
            </div><!--/panel-body-->
    </div><!--/panel-->  

    <div class="panel panel-default">
        <div class="panel-heading"><h4>Toggle Display Order</h4></div>
            <div class="panel-body">

<!--============ process response on or off ==========-->
<?php 
// grab the value of sortby state
    $sql = "SELECT ids, sortby FROM tsw_settings";
    $result = $dbh->query($sql);
         
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $sortby_state = $row['sortby'];
    $ids          = $row['ids'];
} 
?> 

<!--========== mini form to set chronological order of articles ==========-->
            <form name="noreply" action="det-crud.php" method="POST">
                <div class="form-group">
                    <label for="sortby" aria-describedby="helpBlock2">Display Articles Ascending </label><br>
                        
                    <div class="well" id="noreply_radio">
                        <?php $is_checked = $sortby_state; ?> 

                        <i class="fa fa-sort-numeric-asc"></i><input name="sortby" type="radio" value="1" 
                        <?php if (isset($is_checked) && $is_checked=="1") esc( "checked" ); ?>> &nbsp; Yes &nbsp; | &nbsp; 
                        <i class="fa fa-sort-numeric-desc"></i><input name="sortby" type="radio" value="0" 
                        <?php if (isset($is_checked) && $is_checked=="0") esc( "checked" ); ?>> No 

                     </div>
                     <span id="helpBlock2" class="help-block">Checking Yes displays the oldest articles first. <small>Default is No</small></span>
                </div>

                <div class="form-group">
                     <input type="hidden" name="ids" value="<?php esc( $ids ); ?>">
                     <input type="submit" name="submit_sortby" class="btn btn-primary">
                </div>

            </form>
            </div><!--/panel-body-->
    </div><!--/panel-->  

</div>

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading"><h4>Updates</h4></div>
                <div class="panel-body">
TODO<br>turn on or off comments<br>search script<br>pingback trackback<br>sort asc desc<br>transition on page load<br>make lists sortable<br>
           </div><!--/panel-body-->
              </div><!--/panel-->   
</div>