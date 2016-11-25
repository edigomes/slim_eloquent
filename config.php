<?php

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'laravel');
define('DB_USER', 'root');
define('DB_PASSWORD', 'senha');
define('DB_PORT', 3306);

return [
    'paths' => [
        'migrations' => 'migrations'
    ],
    'migration_base_class' => '\MyProject\Migration\Migration',
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_database' => 'dev',
        'dev' => [
            'adapter' => 'mysql',
            'host' => DB_HOST,
            'name' => DB_NAME,
            'user' => DB_USER,
            'pass' => DB_PASSWORD,
            'port' => DB_PORT
        ]
    ]
];