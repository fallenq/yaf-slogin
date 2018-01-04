<?php
return [
    // The configuration of upload
    'upload'    =>  [
        'dir_prefix'=>__DIR__."/../../public/upload/",
    ],
    'slogan'    =>  [
        'env'   =>  [
            'prefix'    => [
                'dev'   =>  'dev',
                'prod'  =>  '',
            ]
        ],
        'user'  =>  [
            'login_info'  =>  'sso:user:login:info',
        ]
    ],
    'hashids'   =>  [
        'default'   =>  [
            'salt'  =>  'fallen-slogin',
            'alphabet'  =>  'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890',
//            'alphabet'  =>  'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890`~!@#$%^&*()-_=+\\|\'";:/?.>,<{[}]',
        ]
    ]
];