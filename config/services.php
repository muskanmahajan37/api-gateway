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

    'python'   =>  [
        'base_uri'  =>  env('PYTHON_SERVICE_BASE_URL'),
        'secret'  =>  env('PYTHON_SERVICE_SECRET'),
    ],



];