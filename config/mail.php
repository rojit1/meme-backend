<?php

return [


    'driver' => env('MAIL_DRIVER', 'smtp'),


    'host' => env('MAIL_HOST', 'smtp.mailgun.org'),

   

    'port' => env('MAIL_PORT', 587),

   

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Please verify your account'),
    ],

  

    'encryption' => env('MAIL_ENCRYPTION', 'tls'),



    'username' => env('MAIL_USERNAME'),

    'password' => env('MAIL_PASSWORD'),

    'sendmail' => '/usr/sbin/sendmail -bs',


    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],


    'log_channel' => env('MAIL_LOG_CHANNEL'),

];

// <?php
// return [
//   "driver" => "smtp",
//   "host" => "smtp.mailtrap.io",
//   "port" => 2525,
//   "from" => array(
//       "address" => "from@example.com",
//       "name" => "Example"
//   ),
//   "username" => "730d91b3c4de0d",
//   "password" => "f798ac43409e08",
//   "sendmail" => "/usr/sbin/sendmail -bs"
// ];
