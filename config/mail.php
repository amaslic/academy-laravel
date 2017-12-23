<?php
return array(
    "driver" => env('MAIL_DRIVER', 'smtp'),
    "host" => "smtp.mailtrap.io",
    "port" => 2525,
    "from" => array(
        "address" => "from@example.com",
        "name" => "Example"
    ),
    "username" => env('MAIL_USERNAME', 'ecf9e3c274e7f5'),
    "password" => env('MAIL_PASSWORD', '8d64977dcc816b'),
    "sendmail" => "/usr/sbin/sendmail -bs",
    "pretend" => false
);
