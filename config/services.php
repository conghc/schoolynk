<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    // 'facebook' => [
    //     'client_id' => '1796277470594951',
    //     'client_secret' => '6c65707c0b8addf91732d469c5072e69',
    //     'redirect' => 'http://schoolynk.vasontel.com/callback/facebook',
    // ],

    'facebook' => [
        'client_id' => '823336094473630',
        'client_secret' => '78a2f5d1d9b420d49094973fc6c6e760',
        'redirect' => 'http://schoolynk.apper.vn/callback/facebook',
    ],

    'twitter' => [
        'client_id' => 'VQhqsxrniFxfoQFkfyxYObmws',
        'client_secret' => 'fQXlqgR2PKFvPLjYOPCrdGheWIKqyEGXMUCpmEvpfIkPsSQnRU',
        'redirect' => 'http://schoolynk.vasontel.com/callback/twitter',
    ],

    'google' => [
        'client_id' => '347077443038-9282f1caqv93t8pnnal3dk4cqin2b0hf.apps.googleusercontent.com',
        'client_secret' => 'r_Iz71jpIMZR3ROY6DkHLHkL',
        'redirect' => 'http://schoolynk.vasontel.com/callback/google',
    ],
];
