<?php

return [
    'appId'             => env('OAUTH_APP_ID', ''),
    'appSecret'         => env('OAUTH_APP_SECRET', ''),
    'scopes'            => env('OAUTH_SCOPES', 'openid profile offline_access user.read'),
    'authority'         => env('OAUTH_AUTHORITY', 'https://login.microsoftonline.com/901cb4ca-b862-4029-9306-e5cd0f6d9f86'),
    'authorizeEndpoint' => env('OAUTH_AUTHORIZE_ENDPOINT', '/oauth2/v2.0/authorize'),
    'tokenEndpoint'     => env('OAUTH_TOKEN_ENDPOINT', '/oauth2/v2.0/token'),
];
