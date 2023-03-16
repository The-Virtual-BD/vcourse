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

    'facebook' => [
        'client_id' => '724636058500321',
        'client_secret' => 'c80f2b73330bb2930eb9ff7836baa3d9',
        'redirect' => 'https://vcourse.net/auth/facebook/callback',
    ],

    'google' => [
        'client_id' => '500026683134-mb8etclc8q88l7n48bkgnifpgl7st9uo.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://vcourse.net/auth/google/callback',
    ],

];
