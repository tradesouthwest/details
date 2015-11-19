<?php 
include 'header.php'; 
?>
<title>Admin Details NanoCMS</title>
<script type="text/javascript" src="../lib/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: "#det_textarea"
        });
    </script>
<style>#editForm #det_texarea {font-size: initial;} </style>
</head>
<body>

<?php include 'admin-nav.php'; ?><div class="clearfix"></div>

<div class="container">
    <div class="row">
        <header class="col-md-12 text-center">
            <h2>Your Are Editing</h2>
        </header>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-2 sm-hidden">
        </div>
        <div class="col-md-8 col-sm-12">
        
<?php
if( isset( $_POST['submit_edit'] )){
    //$idr = $_POST['idr']; 

    require_once '../inc/dbh.php';
    $stmt = $dbh->prepare("SELECT * FROM tsw_respond WHERE idr = ?");

    if( $stmt->execute( array($_POST['idr']) )) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
         
?>

                <p>entry number: <?php esc( $row['idr'] ); ?></p>
                <form action="det-respond-update.php" name="editform" id="editForm" method="POST">

                    <p><label for="name">name </label> <br>
                      <input class="form-control" name="name" type="text" value="<?php echo $row['name']; ?>" ></p>

                    <label for="respond">respond</label><br>
                      <textarea id="det_textarea" class="form-control" name="respond" rows="10"><?php echo $row['respond']; ?></textarea>

                    <p><label for="email">email</label><br>
                      <input class="form-control" name="email" type="url" value="<?php echo $row['email']; ?>"></p>

                    <p><label for="date_respond">date_respond </label><br>
                      <input class="form-control" name="date_respond" type="text" value="<?php esc( $row['date_respond'] ); ?>"></p>

                    <p><label for="stat">approve</label><br>

                    <?php // default for `stat` is 1 = public
                        $checked = $row['stat']; 
                    ?> 
                      <input name="stat" type="radio" <?php if (isset($checked) && $checked=="1") esc( "checked" ); ?> value="1"> Yes &nbsp; | &nbsp; <input name="stat" type="radio" <?php if (isset($checked) && $checked=="0") esc( "checked" ); ?> value="0"> No
                      
                    <hr>
                      
                       <input name="idr" type="hidden" value="<?php esc( $row['idr'] ); ?>">

               <!-- <p><label for="update">Update Edit</label><br>
                    <input name="update_resp" type="submit" value="Update" class="btn btn-success"></p> -->
                </form>
                    <p class="pull-right"><a href="index.php" title="back to admin" class="btn btn-danger">Cancel/Back to Admin</a></p>
        

<?php
  }  
}  
?> 

        </div>
        <div class="col-md-2 sm-hidden">
        </div>

    </div>
</div>
<?php include 'footer.php'; ?>