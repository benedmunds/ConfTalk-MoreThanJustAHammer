var amqp = require('amqplib/callback_api');

amqp.connect('amqp://localhost', function(err, conn) {

  conn.createChannel(function(err, ch) {

  	var queueName = 'notifications';

    ch.assertQueue(queueName, {durable:true});


    console.log('[*] Waiting for notifications');
	ch.consume(queueName, function(msg) {
	 ch.ack(msg);
	  console.log(" [x] Received %s", msg.content.toString());
	});

  });

});