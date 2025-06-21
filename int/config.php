<?php



    define('PATH', realpath('.'));
    define('SUBFOLDER', false);
    define('URL', 'http://127.0.0.1:1245');
       define('ADMIN_URL', 'admin');//dont change if dont know about that

  
    ini_set('display_errors', 0);
    date_default_timezone_set('Asia/Kolkata');
    
    return [
      'db' => [
        'name'    =>  'smmgodv2',
        'host'    =>  'localhost',
        'user'    =>  'root',
        'pass'    =>  '1234',
        'charset' =>  'utf8mb4' 
      ]
    ];
    