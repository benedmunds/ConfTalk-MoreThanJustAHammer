<?php

require_once(__DIR__ . '/vendor/autoload.php');

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;


//connect to rabbit server
$connection = new AMQPStreamConnection(
    'localhost', 5672, 'guest', 'guest');

$channel = $connection->channel();


//create the queue
$channel->queue_declare('notifications', false, true, false, false);


//generate a message obj
$notification = [
    'id'           => microtime(),
    'sender_id'    => 1,
    'recipient_id' => 2,
    'message'      => 'yo'
];


//send it!
$msg = new AMQPMessage(json_encode($notification));

$channel->basic_publish($msg, '', 'notifications');
