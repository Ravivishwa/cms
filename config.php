<?php
require_once 'config/meekrodb.2.3.class.php';
DB::$user = 'root';
DB::$password = '';
DB::$dbName = 'cms2';
DB::$host = ''; //defaults to localhost if omitted
DB::$port = ''; // defaults to 3306 if omitted
DB::$encoding = 'utf8'; // defaults to latin1 if omitted
?>