<?php 
/**
 * TSW Details NanoBlog
 * Author: Larry Judd Oliver @tradesouthwest | http://tradesouthwest.com/details
 * Contributors in readme.md file
 * License in LICENSE.md file
 */
include 'header.php'; 
?>
<title>Dev App Details</title>
<style>
    .pagination span.disabled {
        color: transparent
    }
</style>
</head>
<body>

    <?php include 'nav.php'; ?>

<!--========== Header ========-->
    <div class="container">
        <div class="row">
            <header class="col-md-12 text-center">
                <h2 class="page-header"><?php esc( $det_moniker ); ?></h2>
            </header>
        </div>
    </div>

    <div class="container">
        <div class="row">
<!--========== Page Content ========-->

            <?php 
            // grab the value of sortby state 
            $sql="SELECT sortby FROM tsw_settings"; 
            $result= $dbh->query($sql); 
            while($row = $result->fetch(PDO::FETCH_ASSOC)) { $sortby_state = filter_var( $row['sortby'], FILTER_VALIDATE_INT ); } 
/** 
 * grab state of sortby from settings table 
 * @sortby default = 0 (descending)
 */ 

if( $sortby_state < 1 ) { $sort_by= DESC; } else { $sort_by= ASC; } 
// pagination settings 
if( $paginate < 1 ) { $details_perpage= 12; } else { $details_perpage= $paginate; } 

//include the paginator class 
include 'inc/paginator.php'; 

//create new object pass in number of pages and identifier 
$pages= new Paginator($details_perpage, 'p'); 

// set default view to public 
$prv_pub= filter_var( 1, FILTER_VALIDATE_INT); 

// get database connection 
require_once 'inc/dbh.php'; 

//get number of total records that are not private 
$stmt= $dbh->query("SELECT count(idd) FROM tsw_details 
                    WHERE prv = $prv_pub "); 
$row = $stmt->fetch(PDO::FETCH_NUM); 
$total = $row[0];                         // filter not required since row object is query function 

//pass number of records to 
$pages->set_total($total); 
$data = $dbh->query("SELECT * FROM tsw_details 
                     WHERE prv = 1 ORDER BY idd $sort_by ".$pages->get_limit()); 
foreach($data as $row) { ?>

                <div class="col-md-3" id="detail-article">
                    <ul class="list-group">

                        <li class="list-group-item">
                            <a id="det-header" href="details.php?id=<?php esc( $row['idd'] ); ?>" title="<?php esc( $row['idd'] ); ?>">
                                <?php esc( $row[ 'title'] ); ?> <span></span> <i class="fa fa-eye fa-spec"></i>
                            </a>
                        </li>

                        <?php if( !empty( $row[ 'detail']) ) : ?>
                        <li class="list-group-item" id="text_line">
                            <?php esc( $row[ 'detail'] ); ?><i class="fa fa-commenting-o"></i>
                        </li>
                        <?php else : ?>
                        <li class="hidden"></li>
                        <?php endif; ?>

                        <?php if( !empty( $row[ 'dev_url'] )) : ?>
                        <li class="list-group-item">
                            <?php esc( $row[ 'dev_url'] ); ?><i class="fa fa-globe"></i>
                        </li>
                        <?php else : ?>
                        <li class="hidden"></li>
                        <?php endif; ?>

                        <?php if( !empty( $row[ 'note'] )) : ?>
                        <li class="list-group-item">
                            <?php esc( $row[ 'note'] ); ?><i class="fa fa-flask"></i>
                        </li>
                        <?php else : ?>
                        <li class="hidden"></li>
                        <?php endif; ?>

                        <?php 
                        // set length of text in list-group @weburl numeric
                        if( !empty( $row['website'] )) : $weburl= $row['website']; 
                            $website_url= wordwrap($weburl, 32, "\n", true); ?>

                        <li class="list-group-item">
                            <a href="<?php esc( $row['website'] ); ?>" id="website_url" title="opens in new window" target="_blank">
                                <?php esc( $website_url ); ?>
                            </a><i class="fa fa-external-link fa-det-link"></i>
                        </li>
                        <?php else : ?>
                        <li class="hidden"></li>
                        <?php endif; ?>

                        <?php if( !empty( $row[ 'date_in']) ) : ?>
                        <li class="list-group-item datein">
                            <?php esc( $row[ 'date_in'] ); ?><i class="fa fa-calendar"></i>
                        </li>
                        <?php else : ?>
                        <li class="hidden"></li>
                        <?php endif; ?>
                        <!--========== READ-ON LINK CAN BE INCORPORATED
        <li class="list-group-item textcenter"><a href="details.php?id=<?php esc( $row['idd'] ); ?>" title="<?php esc( $row['idd'] ); ?>" role="navigation"><?php esc($readlink); ?> &rarr;</a></li>  -->
                        <ul>
                </div>

                <?php } ?>
                <div class="col-md-12" role="navigation">

                    <?php echo $pages->page_links(); ?>

                </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>