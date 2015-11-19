<?php
/**
 * TSW Details NanoBlog
 * Author: Larry Judd Oliver @tradesouthwest | http://tradesouthwest.com/details
 * Contributors in readme.md file
 * License in LICENSE.md file
 */
 
// settings - functions - filters

function esc($s){
    echo htmlspecialchars_decode($s, ENT_HTML5);
}

/**
 * mimics the original mysql_real_escape_string but which doesn't need an active mysql connection.
 * @is_arry
 * @is_string
 */
function escmim($inp) { 
    if(is_array($inp)) 
        return array_map(__METHOD__, $inp); 

    if(!empty($inp) && is_string($inp)) { 
        return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp); 
    } 

    return $inp; 
}

// returns only letters and numbers 
function alpha_only( $string )
    {
        return preg_replace('/[^a-zA-Z0-9\s]/', '', $string);
    }

// safe redirect
function redirect($url)
{
    if (!headers_sent())
    {    
        header('Location: '.$url);
        exit;
        }
    else
        {  
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="3;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}
// display sessions (for debug)
function display_sessions() {
$html=
$html .= '<pre>';
$html = print_r($_SESSION);
$html .= '<pre>';
return $html;
}
?>
