<?php

return [
    'serverKey'    => env('MIDTRANS_SERVER_KEY', 'SB-Mid-server-T8UtdEirr-D3So7jpZkkD_gv'),
    'clientKey'    => env('MIDTRANS_CLIENT_KEY', 'SB-Mid-client--FLypMd_WAAnn4pe'),
    'isProduction' => env('MIDTRANS_IS_PRODUCTION', false),
    'isSanitized'  => env('MIDTRANS_SANITIZED', true),
    'is3ds'        => env('MIDTRANS_ENABLE_3DS', true),
];

