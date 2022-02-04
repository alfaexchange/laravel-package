<?php

/**
 * Copyright (c) Dmitry Kovalev.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/alfaexchange/laravel-api
 */
return [
    /*
     |--------------------------------------------------------------------------
     | Alfa Exchange config
     |--------------------------------------------------------------------------
     |
     | To receive the parameters of the token and the secret, you need to
     | register on the https://alfaexchange.io/ website and get credentials from the cabinet.
     |
     |--------------------------------------------------------------------------
     | Alfa Exchange timeout
     |--------------------------------------------------------------------------
     | The maximum number of seconds to wait for a response
    */
    'token'     => env('ALFAEXCHANGE_API_KEY', null),

    /*
     |--------------------------------------------------------------------------
     | Alfa Exchange timeout
     |--------------------------------------------------------------------------
     | The maximum number of seconds to wait for a response
     */
    'timeout'   => env('ALFAEXCHANGE_TIMEOUT', 10),

];
