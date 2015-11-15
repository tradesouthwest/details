# Details NanoBlog
Small foot-print nano blog platform
## Overview
* PHP, HTML5, Twitter Bootstrap, jQuery
* Small foot-print blog platform
* Easy to follow PHP - no hidden functions 
* Code is WYSIWYG on page
* No hunting through folders to find model
* Some helper routines but no controllers
* Loads faster than MVC based blogs
* Runs fater than MVC
* Curates PHP as an API not an alternative 
* TSW Login-Register included
* Utilises jQuery TE for text-editor 
* several security functions and sanitizers
* Uses PHP Pagination Class


## Code Example
Example of security measures using PDO and PHP5 var_filters
```
$prv_pub = filter_var( 1,  FILTER_VALIDATE_INT);
    // grab all non-private items from db
    require_once 'inc/dbh.php';
    $sql = "SELECT * FROM tsw_details WHERE prv = $prv_pub";
    $result = $dbh->query($sql);
        // Parse returned data, and displays them
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $idd_int = $row['idd']; if (!filter_var($idd_int, FILTER_VALIDATE_INT) === false) { 

```

## Motivation
Main motive is to advance the use of PHP out-of-the-box coding over MVC and framework deployment of a CMS. All code for the core application is written and executed in PDO so that any intermediate coder can run their website with a zero learning learning curve. There may be many whom disagree with my intentions to promote "less" MVC but this project is for intermediate learners of PDO and will remain devoted to those people so that the basics of PHP can be understood and the scope of applying PDO and PHP in there "raw" forms will promolgate better understanding of coding.  

## Installation
Very basic PHP Apache Server, LAMP style install:
* create a database or just add the one table to an existing database
* the table is in the `inc` directory; file named `sql.txt`
* add settings in file `inc/settings.php` and connection in `inc/dbh.php`

demo: http://tradesouthwest.com/dev/details

## Contributors
Open for contributions. 

## License
Licensed under MIT License (MIT). 
http://opensource.org/licenses/MIT
