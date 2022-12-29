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
    'github' => [
        'client_id' => 'Iv1.223fd6c09207b254', //Github API
        'client_secret' => '5bf1bc00f9583a975bc5b426b678b114eadb28ed', //Github Secret
        'redirect' => 'http://localhost:8000/login/github/callback',
     ],
     'google' => [
        'client_id' => '122886334250-fsfd8ugugkr0hjrkakukbgnnruomjn95.apps.googleusercontent.com', //Google API
        'client_secret' => 'eyuwbzXGBgbebzPXNiqSOods', //Google Secret
        'redirect' => 'http://localhost:8000/login/google/callback',
     ],
     'facebook' => [
        'client_id' => '1273663786526056', //Facebook API
        'client_secret' => 'cdd56555102958f93a46ca0482170148', //Facebook Secret
        'redirect' => 'http://localhost:8000/login/facebook/callback',
     ],

];
