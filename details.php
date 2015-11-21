<?php 
/**
 * TSW Details NanoBlog
 * Author: Larry Judd Oliver @tradesouthwest | http://tradesouthwest.com/details
 * Contributors in readme.md file
 * License in LICENSE.md file
 */
require 'header.php'; 
?>
<title>Dev App for Looping Details</title>
<style> div.detail-item{font-size: initial;} </style>
</head>
<body>
<?php include 'nav.php'; ?>
<div class="clearfix"></div>
<div class="container">
    <div class="row">
        <header class="col-md-12 text-center">
            <h2 class="page-header"><?php esc( $det_moniker ); ?></h2>
        </header>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-2 sm-hidden"><!--fake gutter-->
        </div>
        
<?php
if( isset( $_GET['id'] )){
    // var stored for response form below
    $id = filter_var( $_GET['id'], FILTER_VALIDATE_INT );

    require_once 'inc/dbh.php';
    $stmt = $dbh->prepare("SELECT * FROM tsw_details 
                           WHERE idd = ?");
    if( $stmt->execute( array( $_GET['id'] ))) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!--========== Custom details panels inside Boots panels ==========-->
        <article class="col-md-8 col-sm-12">
            <div class="panel panel-default" id="details-panel">
                <header class="panel-heading">
                    <h3 class="panel-title"><?php esc( $row['title'] ); ?></h3>
                </header>
            <div class="panel-leftheading">
                <i class="panel-lefttitle fa fa-external-link"></i>
            </div>
                <div class="panel-rightbody"> 
                    <div class="detail-item">

                    <?php if( !empty( $row['website']) ) : ?>
                    
                        <a href="<?php esc( $row['website'] ); ?>" title="opens in new window" class="btn btn-link col-lg-12" id="wrap-text" target="_blank"><?php esc( $row['website'] ); ?></a>
                        
                    <?php else : ?>
                        <a href="javascript: void(0)" title="no url"><span class="blank-spc"> &nbsp; </span></a>
                        
                    <?php endif; ?>

                    </div> 
                        </div><div class="clearfix"></div><hr>
                            <div class="panel-leftheading" id="panel-leftheading-2">
                                <i class="panel-lefttitle fa fa-commenting-o"></i>
                            </div>

		            <div class="panel-rightbody" role="content">
                                <div class="detail-item">
                                	
                                    <?php esc( $row['detail'] ); ?>
                                    
                                </div>
                            </div><div class="clearfix"></div>
                    <div class="panel-body">

                        <blockquote>
                            <span class="note-text"><?php esc( $row['note'] ); ?></span><br>
                            <span class="dev-url"><?php esc ( $row['dev_url'] ); ?></span><br>
                            <span class="date-in"><?php esc ( $row['date_in'] ); ?></span>
                        </blockquote>

                    </div> 

<?php 

    $noreply_is = (int)1;

    // grab the value of noreply state
    $sql = ("SELECT noreply FROM tsw_settings
    ORDER BY ids DESC LIMIT 1");
    $result = $dbh->query($sql);
         
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $noreply_state = $row['noreply'];
    }
    if( $noreply_state === "0" ) : 
    // responses are set to 1 OK to proceed
?>

                    <div class="panel-body" id="respond">

                        <form action="respond.php" method="POST" name="respondform">
                            <input type="submit" name="respond" class='btn btn-default btn-sm' value="Respond">
                            <input type="hidden" name="idd_is" value="<?php esc( $row['idd'] ); ?>">
                            <input type="hidden" name="respond_to" value="<?php esc( $row['title'] ); ?>">
                        </form>
<!--========== Responses Section ==========-->

                        <?php include 'response.php'; ?>

                    </div>
    <?php endif; ?> <div class="clearfix"></div>
                        <footer class="panel-footer">
                            <p class="textcenter"><a href="javascript:history.back(0)" title="Back" role="navigation">Return &larr;</a></p>
                        </footer>
                </div><!--ends panel-->
            </article><div class="clearfix"></div>
            
<?php  

    } else { print("Could not get id of item"); }
}
?> 

        <div class="col-md-2 sm-hidden"><!--fake gutter-->
        </div>

    </div>
</div>
<?php include 'footer.php'; ?>
