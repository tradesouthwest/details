<?php
/**
 * TSW Details NanoBlog
 * theme and page settings
 */

require_once '../inc/dbh.php';
/** get the page count
 * total pages in blog
 * @row idd
 */
    $sql = ("SELECT count(*) FROM tsw_details");
    $result = $dbh->prepare($sql); 
    $result->execute(); 
    $number_of_rows = $result->fetchColumn(); 

/** get the last (current) setting id and pagination count
 * default is 12 pages
 * @row paginate
 */
   $stmt = $dbh->prepare("SELECT ids, paginate, theme FROM tsw_settings ORDER BY ids DESC LIMIT 1");
   $stmt->execute(); 
       if( $stmt !==false ) {
           while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
           $paginate   = $row['paginate'];
           $theme      = $row['theme'];
           $ids        = $row['ids'];
           }  
    } else {
?>
        
        <div class="panel panel-danger">
          <div class="panel-heading">
            <h3 class="panel-title">Data failed</h3>
          </div>    
            <div class="panel-body">
             Pagination did not update - try again please. <br>
            <?php echo date('m-d-Y H:m'); ?>
            </div>
        </div>            
        <?php
        }   
?>
    <div id="det-panels">
     
        <div class="col-md-6 col-xs-12"> 

<!--========== LEFT HALF ==========-->
        <form name="editform" id="editForm" method="POST" action="det-crud.php">
            <div class="form-group">
                <label for="curr"><i class="fa fa-tachometer"></i> Current Total Article Count </label>

                <!-- 3x4 centers small elements like this input -->
                <div class="col-sm-4"></div>
                <div class="col-sm-4">

                    <input type="number" id="curr" class="form-control" readonly name="curr" value="<?php esc( $number_of_rows ); ?>">

                </div>
                <div class="col-sm-4"></div>
            </div>          
            <div class="form-group">
                <label for="paginate"><i class="fa fa-list-ol"></i> Set Pagination 
                <em class="col-det-panel-6"><i class="fa fa-list-ol"></i> Current Count:</em></label> 
                <div class="col-sm-4">
               
                    <input class="form-control" name="paginate" type="number" size="10" min="1" max="500" 
                        value="<?php esc( $paginate ); ?>" aria-describedby="helpBlock">
                   
                </div>
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
 
                    <input class="form-control" type="number" name="current_paginate" readonly value="<?php esc( $paginate ); ?>">

                </div>
                    <div class="col-sm-12"><hr>
                        <span id="helpBlock" class="help-block">
                            <small>Controls how many articles to show on a page. 
                            To make your page look even, divide any pagination by fours.</small></span>
                    </div><div class="clearfix"></div>
            </div>
                <div class="form-group">
                    <input name="nonce" type="hidden" value="1a2b3c4d5e">
                    <input name="ids" type="hidden" value="<?php esc( $ids ); ?>">
                    <label for="submit_pagi"><i class="fa fa-list-ol"></i> Update Pagination Count</label> 

                    <span class="textcenter"><input type="submit" name="submit_pagi" value="Update Count" class="btn btn-natural"></span>

                </div>
        </form>
        </div><!-- ends left 6 -->

<!--========== RIGHT HALF ==========-->       
            <div class="col-md-6 col-xs-12"> 

            <form name="editform" id="editForm" method="POST" action="extend-style.php">

<?php
/** get the last (current) settings for styles
 *  default is fafafa
 *  @rows of last entry 
 */
   $stmt = $dbh->prepare("SELECT * FROM tsw_extend_style ORDER BY ide DESC LIMIT 1");
   $stmt->execute(); 
       if( $stmt !==false ) {
           while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
           $headcolor  = $row['headcolor'];
           $listcolor  = $row['listcolor'];
           $backcolor  = $row['backcolor'];
           $linkcolor  = $row['linkcolor'];
           }  
       }
?>

                <div class="form-group">
                    <label for="theme"><i class="fa fa-columns"></i> Theme is</label>

                    <input type="text" readonly class="form-control" name="theme" value="<?php esc( $theme ); ?>">

                </div>
                <div class="form-group">
                    <label for="headcolor"><i class="fa fa-cog"></i> Header &amp; Footer Color 
                        <em class="col-det-panel-6"><i class="fa fa-cog"></i> Content area color</em></label> 
                    <div class="col-sm-4">
                       
                      <input type="text" class="form-control" name="headcolor" 
                          value="<?php esc( $headcolor ); ?>" placeholder="ffa"> 
                     
                    </div>
                    <div class="col-sm-4">
                       
                    </div>
                    <div class="col-sm-4">
                      
                       <input type="text" class="form-control" name="listcolor" 
                           value="<?php esc( $listcolor ); ?>" placeholder="fafaaa"  aria-describedby="helpBlock2"> 

                    </div>
                        <div class="col-sm-12"><hr>
                            <span id="helpBlock" class="help-block2"><small class="text-muted">Alpha only (no &#35; or &#59;)<br>
                            HTML color references visit: <a href="http://www.w3schools.com/cssref/css_colorsfull.asp" title="html colors - OPENS IN NEW WINDOW" target="_blank">www.w3schools.com/cssref/css_colorsfull</a></small></span>
                        </div><div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <input name="nonce" type="hidden" value="1a2b3c4d5f">
                    <input name="ide" type="hidden" value="<?php esc( $ide ); ?>">
                    <label for="submit_hexc"><i class="fa fa-cog"></i> Update Theme Preferences</label> 

                    <span class="textcenter"><input type="submit" name="submit_hexc" value="Update Theme" class="btn btn-natural"></span>

                </div>
</form>
            </div><!-- ends right 6 -->

</div>
<div class="clearfix"></div>
