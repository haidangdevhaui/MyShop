<?php

/**
 * defined validation rule
 * document https://laravel.com/docs/5.5/validation
 * param_name => rule||optional
 */
return [
    'auth_login' => [
        'email'    => 'required|email',
        'password' => 'required|min:8',
    ],
    'auth_register' => [
        'full_name' => 'required',
        'email'     => 'required | email | unique:users',
        'password'  => 'required | min:8',
    ],
    'fetch_child_product_category' => [
        'parent_id' => 'required'
    ],
    'fetch_flash_sale' => [
        'limit' => 'integer'
    ]
];
