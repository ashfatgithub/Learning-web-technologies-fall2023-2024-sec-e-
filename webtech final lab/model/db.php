<?php

    $dbhost = "localhost";
    $dbname = "testdb";
    $dbuser = "root";
    $dbpass = "";

    function getConnection(){
        global $dbhost;
        global $dbname;
        global $dbpass;
        global $dbuser;
        
        $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        return  $con;
    }
?>