<?php
return [
    "driver" => "smtp",
    "host" => "smtp.mailtrap.io",
    "port" => 2525,
    "from" => array(
        "address" => env('MAIL_FROM_ADDRESS'),
        "name" => "FLEX"
    ),
    "username" => "fdb5be632869c8",
    "password" => "fd9b9e05bd45d8",
    "sendmail" => "/usr/sbin/sendmail -bs"
];