<?php

/**
 * defined validation rule
 * document https://laravel.com/docs/5.5/validation
 */
return [
    'auth_login'    => [
        'email'    => 'required|email',
        'password' => 'required|min:8',
        'test'     => 'optional',
    ],
    'auth_register' => [
        'full_name' => 'required',
        'email'     => 'required | email | unique:users',
        'password'  => 'required | min:8',
    ],
];
