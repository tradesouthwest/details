<?php
/**
 * TSW Details NanoBlog
 * Author: Larry Judd Oliver @tradesouthwest | http://tradesouthwest.com/details
 * Contributors in readme.md file
 * License in LICENSE.md file
 *
 * **** the default cp login is ****
 * name= `director` pass= `details`
 */

// settings grabbed from table `tsw_settings`
 
    require_once 'dbh.php';
    $stmt = $dbh->prepare("SELECT * FROM tsw_settings ORDER BY ids DESC LIMIT 1");
    $stmt->execute(); 
    if( $stmt) {
        while ($row = $stmt->fetch()) {

    $theme_url    = $row['theme_url'];
    $server_email = $row['server_email'];
    $det_name     = $row['det_name'];
    $det_moniker  = $row['det_moniker'];
    $readlink     = $row['readlink'];
    $private      = $row['private'];
    $theme        = $row['theme'];
    $paginate     = $row['paginate'];
    }
}

?>