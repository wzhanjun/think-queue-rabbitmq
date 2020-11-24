<?php

/**
 * This is an example of queue connection configuration.
 * It will be merged into config/queue.php.
 * You need to set proper values in `.env`.
 */

use think\Env;

return [

    'connector' => 'jayazhao\\queue\\connector\\RabbitMQ',

    'dsn' => Env::get('RABBITMQ_DSN', null),

    'host' => Env::get('RABBITMQ_HOST', '127.0.0.1'),
    'port' => Env::get('RABBITMQ_PORT', 5672),

    'vhost'    => Env::get('RABBITMQ_VHOST', '/'),
    'login'    => Env::get('RABBITMQ_LOGIN', 'guest'),
    'password' => Env::get('RABBITMQ_PASSWORD', 'guest'),

    'queue' => Env::get('RABBITMQ_QUEUE', 'default'),

    'options' => [

        'exchange' => [

            'name' => Env::get('RABBITMQ_EXCHANGE_NAME'),

            /*
            * Determine if exchange should be created if it does not exist.
            */
            'declare' => Env::get('RABBITMQ_EXCHANGE_DECLARE', true),

            /*
            * Read more about possible values at https://www.rabbitmq.com/tutorials/amqp-concepts.html
            */
            'type'        => Env::get('RABBITMQ_EXCHANGE_TYPE', \Interop\Amqp\AmqpTopic::TYPE_DIRECT),
            'passive'     => Env::get('RABBITMQ_EXCHANGE_PASSIVE', false),
            'durable'     => Env::get('RABBITMQ_EXCHANGE_DURABLE', true),
            'auto_delete' => Env::get('RABBITMQ_EXCHANGE_AUTODELETE', false),
            'arguments'   => Env::get('RABBITMQ_EXCHANGE_ARGUMENTS'),
        ],

        'queue' => [

            /*
            * Determine if queue should be created if it does not exist.
            */
            'declare' => Env::get('RABBITMQ_QUEUE_DECLARE', true),

            /*
            * Determine if queue should be binded to the exchange created.
            */
            'bind' => Env::get('RABBITMQ_QUEUE_DECLARE_BIND', true),

            /*
            * Read more about possible values at https://www.rabbitmq.com/tutorials/amqp-concepts.html
            */
            'passive'     => Env::get('RABBITMQ_QUEUE_PASSIVE', false),
            'durable'     => Env::get('RABBITMQ_QUEUE_DURABLE', true),
            'exclusive'   => Env::get('RABBITMQ_QUEUE_EXCLUSIVE', false),
            'auto_delete' => Env::get('RABBITMQ_QUEUE_AUTODELETE', false),
            'arguments'   => Env::get('RABBITMQ_QUEUE_ARGUMENTS'),
        ],
    ],

    /*
     * Determine the number of seconds to sleep if there's an error communicating with rabbitmq
     * If set to false, it'll throw an exception rather than doing the sleep for X seconds.
     */
    'sleep_on_error' => Env::get('RABBITMQ_ERROR_SLEEP', 5),

    /*
     * Optional SSL params if an SSL connection is used
     */
    'ssl_params' => [
        'ssl_on'      => Env::get('RABBITMQ_SSL', false),
        'cafile'      => Env::get('RABBITMQ_SSL_CAFILE', null),
        'local_cert'  => Env::get('RABBITMQ_SSL_LOCALCERT', null),
        'local_key'   => Env::get('RABBITMQ_SSL_LOCALKEY', null),
        'verify_peer' => Env::get('RABBITMQ_SSL_VERIFY_PEER', true),
        'passphrase'  => Env::get('RABBITMQ_SSL_PASSPHRASE', null),
    ],
];
