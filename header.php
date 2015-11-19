<?php
/**
 * TSW Details NanoBlog
 * Author: Larry Judd Oliver @tradesouthwest | http://tradesouthwest.com/details
 * Contributors in readme.md file
 * License in LICENSE.md file
 */
 
require_once 'inc/controls.php';
require_once 'inc/settings.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="lib/tools/editor/release/nekland-editor.css" />
  <link rel="stylesheet" href="<?php esc( $theme_url ); ?>/theme-style.css">
  <link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,300,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<style>
/** Intentionally left independent from css 
    to allow direct attribute styling */
body{
    font-family: 'Lato', sans-serif;
    background-color: rgb(254, 254, 254);
    margin-top: 50px;
    font-size: inherit;
    font-size: 1em;
    font-size: 16px;
}
</style>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
