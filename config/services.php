<?php

return [
    'authors'   =>  [
        'base_uri'  =>  env('AUTHORS_SERVICE_BASE_URL'),
        'secret'  =>  env('AUTHORS_SERVICE_SECRET'),
    ],

    'service'   =>  [
        'base_uri'  =>  env('SERVICE_SERVICE_BASE_URL'),
        'secret'  =>  env('SERVICE_SERVICE_SECRET'),
    ],

    'payment'   =>  [
        'base_uri'  =>  env('PAYMENT_SERVICE_BASE_URL'),
        'secret'  =>  env('PAYMENT_SERVICE_SECRET'),
    ],


];