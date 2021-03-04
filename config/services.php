<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google'=>[
        'client_id'=>"871781800305-4cufhllah8bl6ldtn8r89adfqjkc6cp1.apps.googleusercontent.com",
        'client_secret'=>"OkNg1_bAb8gIvTg3uhSegwrW",
        'redirect'=>'http://localhost:8000/auth/google/callback',
    ],

];
//http://localhost:8000/auth/google/callback
//env('GOOGLE_CLIENT_SECRET')