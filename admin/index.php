<?php
session_start();
if (!isset($_SESSION['user_session']))
{
header('Location: ../lib/user/login.php');
}

include 'header.php';
$page = "index";
$title= "TSW-Details Admin Control Panel";
?>
<style>.tab-pane{transition: .25s;}body{background: #e1e8e5;}.det-list-container table thead tr th {background: #e1e8e5 !important; }</style>
<title><?php print($title); ?></title>
</head>
<body>

<?php include 'admin-nav.php'; ?><div class="clearfix"></div>

<div class="container">
    <div class="row">

        <header class="col-md-12 text-center">
        <h3 class="page-header">Admin Control Panel</h3>
 <p>Admin only page - Welcome <?php echo $_SESSION['firstname']; ?> <a href='../lib/user/logout.php' class="btn btn-default btn-sm">Logout</a> &nbsp; | &nbsp;  <?php if( isset( $_SESSION['user_session']) ) { esc("You are safely logged in "); } ?></p>
        </header>

    </div>
</div>

<div class="container">
    <div class="row">
            
        <div class="col-lg-12 col-sm-12">
            
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                    <ul class="nav nav-tabs" id="adminTabs">
<!-- tab a -->          <li class="active"><a href="#tab0default" data-toggle="tab"><i class="fa fa-globe"></i> Admin Page</a></li>
<!-- tab 1 -->          <li><a href="#tab1default" data-toggle="tab"><i class="fa fa-edit"></i> Details</a></li>
<!-- tab 2 -->          <li><a href="#tab2default" data-toggle="tab"><i class="fa fa-comments"></i> Responses</a></li>
<!-- tab 3 -->          <li><a href="#tab3default" data-toggle="tab"><i class="fa fa-newspaper-o"></i> Theme</a></li>
<!-- tab 4 -->          <li><a href="#tab4default" data-toggle="tab"><i class="fa fa-gears"></i> Preferences</a></li>
                    </ul>
                </div>
                <div class="panel-body">

                    <div class="tab-content">

<!-- tab a -->          <div class="tab-pane fade in active" id="tab0default">
                           <header class="sm-header no-well-bottom">
                             <h3>Administrative Functions</h3>
                            </header>
                            
                            <?php include 'det-dashboard.php'; ?>

                        </div> 

<!-- tab 1 -->          <div class="tab-pane fade in" id="tab1default">
                           <header class="sm-header no-well-bottom">
                             <h3>Article Control</h3>
                            </header>

                            <?php include 'details-list.php'; ?>

                        </div> 

<!-- tab 2 -->          <div class="tab-pane fade no-well-top" id="tab2default">
                            <header class="sm-header no-well-bottom">
                             <h3>Responses Management</h3>
                            </header>

                             <?php include 'det-respond.php'; ?>

                        </div> 

<!-- tab 3 -->          <div class="tab-pane fade" id="tab3default">
                           <header class="sm-header no-well-bottom">
                             <h3>Page Controls</h3>
                            </header>
                             <?php include 'det-theme.php'; ?>

                        </div> 

<!-- tab 4 -->          <div class="tab-pane fade" id="tab4default"> 
                           <header class="sm-header no-well-bottom">
                             <h3>Global Setup</h3>
                            </header>
                            <?php include "det-global.php"; ?>

                        </div> 
                       
                    </div><!-- ends tab-content -->

                </div><!-- ends panel-body --> 
            </div>

<script>
// keeps panel open after submit
$(document).ready(function() {
    if(location.hash) {
        $('a[href=' + location.hash + ']').tab('show');
    }
    $(document.body).on("click", "a[data-toggle]", function(event) {
        location.hash = this.getAttribute("href");
    });
});
$(window).on('popstate', function() {
    var anchor = location.hash || $("a[data-toggle=tab]").first().attr("href");
    $('a[href=' + anchor + ']').tab('show');
});
</script>
        </div><!-- ends col-12 -->
    </div>
</div>
<?php include 'footer.php'; ?>