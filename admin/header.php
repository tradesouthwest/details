<?php
/**
 * Details
 * Tradesouthwest
 */
include '../inc/settings.php';
include_once '../inc/controls.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php esc( $theme_url ); ?>/theme-style.css">
  <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<style>

body{
    font-family: 'Lato', sans-serif;
    background-color: rgb(255, 255, 255);
    margin-top: 50px;
    font-size: inherit;
    font-size: 1em;
    font-size: 16px;
}
span.textcenter {
    margin: 0 auto;
    position: relative;
    left: 41.5%;
    text-align: center;
}
/* Admin styles
======================================== */
#admin-nav-top {
    margin-top: .812em;
}
.det-list-anchor {
    min-width: 42px; height: 1.67em; padding: 1px 5px; background-image: linear-gradient(#efefef, #fcfcfc, #e4e4e4);
    margin:0; border: thin solid #ddd; border-radius:4px;
}
.det-list-container table { 
    width: 100%;
}
.det-list-container thead tr th { 
    border-right: 1px dotted white; padding-left: 3px; color: #000;
}
 
.det-list-container table td {
    max-width: 200px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    padding: 0 10px;
}
#editForm .form-group {
    max-width: 98%;
    min-height: 82px;
    margin: 10px auto;
    box-shadow:  0 1px 1px rgba(0,0,0,.15);
    border-radius: 4px; 
    border: 1px solid #ddd;
    padding: 0 0 10px 0;
}
.help-block{
    padding-left: 8px;
}
input[type="text"]:focus {
    outline: none;
}
 
#editForm div.form-group input[type=""],  
#editForm div.form-group input[type=text],
#editForm div.form-group input[type=url],
#editForm div.form-group input[type=email],
#editForm div.form-group input[type=number],
#editForm div.form-group radio {
    max-width: 91.67%;
    margin: 0 auto;
    padding: 3px 8px 0 8px;
    border-color: #aaa;
    background-color: #ffe;
    color: #111;
    font-size: 1.5rem;
}
#editForm .form-group input[type=number],
#editForm .form-group #curr {
    text-align: right;
    letter-spacing: 1.72px;
}
#editForm div.form-group span { padding-left: 12px; background: transparent; }
#editForm .bg-j {background-color: #ebeeef; }
#editForm input[readonly] { background: #fafafa !important; }
#det-panels label {
    height: 28px;
    width: 100%; 
    padding: 3px 0 5px 0; 
    margin-bottom: 10px;
    position: relative; 
    top: 0;
    background:#fafafa;
    color: #678 !important;
    padding-left: 1em;
}
#det-panels #righthalf .form-group {
    min-height: 84px !important;
    margin: 10px auto;
} 
#det-panels .form-group .col-sm-6 input { 
    width: 98%;
}
#det-panels .form-group label .col-det-panel-6,
#det-panels #righthalf .form-group label .col-det-panel-6 {
    position: relative; 
    left: 24%; 
}

.sm-header{ text-shadow: 0 1px 1px #555; text-align: center;color: white;position: relative; top: -10px; 
    background: #709fa9;height: auto;padding: 0 8px 8px 8px; margin: 0 auto; box-shadow: 0 1px 1px #999; }
.no-well-top{ padding-top:0 !important;margin-top:0 !important;position: relative; top:-1px; }
.no-well-bottom{padding-bottom:0 !important;margin-bottom:0 !important; }
i.fa { color: #739993;background-color: #fafafa; padding: 2px; border-radius: 3px;box-shadow: 0 0 2px #888;margin-right: 5px; }
#noreply_radio .help-block i.fa { text-decoration: line-through !important; /* fa icons this not working */ }

.text-j {color: #777; }
.text-d { color: #000; }
.text-r { color: #900; }
.marg-r2 { position: relative; margin-left: 20%; text-decoration: underline; font-style: italic; }

.text-right { text-align: right !important; }
.text-center { text-align: center !important; }
.text-left { text-align: left !important; }

@media all and (max-width: 980px){
#editForm div.form-group input[type=""],  
#editForm div.form-group input[type=text],
#editForm div.form-group input[type=url],
#editForm div.form-group input[type=email],
#editForm div.form-group input[type=number],
#editForm div.form-group radio {
    font-size: 1.67rem;
    padding: 2px 5px;
    }
}
</style>
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
