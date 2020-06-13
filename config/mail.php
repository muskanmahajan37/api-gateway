<?php
return [
    "driver" => "smtp",
    "host" => "smtp.mailtrap.io",
    "port" => 2525,
    "from" => array(
        "address" => env('MAIL_FROM_ADDRESS'),
        "name" => "FLEX"
    ),
    "username" => env("MAIL_USERNAME"),
    "password" => env("MAIL_PASSWORD"),
    "sendmail" => "/usr/sbin/sendmail -bs"
];