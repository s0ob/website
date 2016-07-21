<?php

	 $DB_host = "localhost";
	 $DB_user = "root";
	 $DB_password= "";
	 $DB_name = "userinfo";
	 
	 $MySQLi_CON = new MySQLi($DB_host,$DB_user,$DB_password,$DB_name);
    
     if($MySQLi_CON->connect_error)
     {
         die("ERROR : -> ".$MySQLi_CON->connect_error);
     }


