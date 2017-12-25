<?php
return array(
    "driver" => "smtp",
    "host" => "smtp.mailtrap.io",
    "port" => 2525,
    "from" => array(
        "address" => "from@example.com",
        "name" => "Example"
    ),
    "username" => "",
    "password" => "",
    "sendmail" => "/usr/sbin/sendmail -bs",
    "pretend" => false
);
