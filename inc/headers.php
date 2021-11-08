<?php
header('Access-Control-Allow-Origin:' . $_SERVER["HTTP_ORIGIN"]); /*. $_SERVER['HTTP_ORIGIN']*/
header('Access-Control-Allow-Credentials:true');
header('Access-Control-Allow-Max-Age: 3600');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

