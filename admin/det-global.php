<?php
/**
 * TSW Details NanoBlog
 * global headings and config
 */

    require_once '../inc/dbh.php';
    $stmt = $dbh->prepare("SELECT * FROM tsw_settings ORDER BY ids DESC LIMIT 1");
    $stmt->execute(); 
    if( $stmt) {
        while ($row = $stmt->fetch()) {
?>
    <div id="det-panels">
        <form name="editform" id="editForm" method="POST" action="pref-update.php">
        <div class="col-md-6"> 
            <div class="form-group">
                <label for=""><i class="fa fa-home"></i> theme_url <em class="marg-r2 text-r"> SET NEW VALUES </em></label>

                    <input class="form-control" name="theme_url" value="<?php esc( $row['theme_url'] ); ?>" type="text">

            </div>
            <div class="form-group">
                <label for="admin_email"><i class="fa fa-envelope"></i> admin_email</label>

                <input class="form-control" name="server_email" type="text" value="<?php esc( $row['server_email'] ); ?>">

            </div>
            <div class="form-group">
                <label for="">det_name</label>

                <input class="form-control" name="det_name" type="text" value="<?php esc( $row['det_name'] ); ?>">

            </div>
            <div class="form-group">
                <label for="">det_moniker</label>

                <input class="form-control" name="det_moniker" type="text" value="<?php esc( $row['det_moniker'] ); ?>">

            </div>
            <div class="form-group">
                <label for="">readlink <small> change this to your language</small></label>

                <input class="form-control" name="readlink" type="text" value="<?php esc( $row['readlink'] ); ?>">

            </div>
            <div class="form-group">
                <?php $checked = $row['private']; ?> 

                <label for="private">Private/Maintenance Mode</label>
                <!-- 3x4 centers small elements like this input -->
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                
                    <span><input name="private" type="radio" value="0" 
                    <?php if (isset($checked) && $checked=="0") esc( "checked" ); ?>> Yes &nbsp; | &nbsp; 

                          <input name="private" type="radio" value="1" 
                    <?php if (isset($checked) && $checked=="1") esc( "checked" ); ?>> No 
                    </span>

                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
<!-- ========== Right Half ========== -->       
            <div class="col-md-6" id="righthalf">  
                <div class="form-group bg-j">
                    <label for="">theme url <em class="marg-r2 text-r"> CURRENT VALUES </em></label> <br>
                    <span class="text-d"><?php esc( $row['theme_url'] ); ?></span>
                </div>
                <div class="form-group bg-j">
                    <label for="server_email"> admin email </label><br>
                    <span class="text-d"><?php esc( $row['server_email'] ); ?></span>
                </div>
                <div class="form-group bg-j">
                    <label for="">site name </label><br>
                    <span class="text-d"><?php esc( $row['det_name'] ); ?></span>
                </div>
                <div class="form-group bg-j">
                    <label for="">slogan </label><br>
                    <span class="text-d"><?php esc( $row['det_moniker'] ); ?></span>
                </div>
                <div class="form-group bg-j">
                    <label for="">read more link </label><br>
                    <span class="text-d"><?php esc( $row['readlink'] ); ?></span>
                </div>
 
                <div class="col-md-6 bg-j">
                    <input name="nonce" type="hidden" value="12345">
                    <input name="ids" value="<?php esc( $row['ids'] ); ?>" type="hidden">
                  <div class="form-inline">
                    <p><label for="">Update Preferences </label><br>

                        <input type="submit" name="submit_pref" class="btn btn-primary" value="Update">
                 
                    <span class="pull-right"><a href="index.php" title="back to admin" class="btn btn-danger">Cancel</a></span></p>
                  </div>
                </div>
            </div>
        </form>
    </div>
<?php  
   } 
} else { print("Could not get id of item"); }
?><div class="clearfix"></div>