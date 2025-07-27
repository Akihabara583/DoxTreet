<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Subscription Plans
    |--------------------------------------------------------------------------
    |
    | Здесь определяются все тарифные планы и их лимиты.
    |
    */
    'plans' => [
        'base' => [
            'daily_template_limit' => 2,
            'daily_signature_limit' => 1,
            'daily_download_limit' => 2, // Общий лимит на скачивания
            'custom_template_limit' => 0,
        ],
        'standard' => [
            'daily_template_limit' => 20,
            'daily_signature_limit' => 20,
            'daily_download_limit' => 20,
            'custom_template_limit' => 0,
        ],
        'pro' => [
            'daily_template_limit' => 50,
            'daily_signature_limit' => 50,
            'daily_download_limit' => 50,
            'custom_template_limit' => 10,
        ],
    ],
];
