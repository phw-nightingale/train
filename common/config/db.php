<?php

return [
    'class' 		=> 'yii\db\Connection',
    // 配置主服务器
    'dsn' 			=> 'mysql:host=localhost;dbname=muzi_edu',
    'username' 		=> 'root',
    'password' 		=> '199798',
	'charset'  		=> 'utf8',
	'tablePrefix' 	=> 'edu_',

    // 配置从服务器
    'slaveConfig' => [
        'username' 		=> 'root',
        'password' 		=> '199798',
		'charset'  		=> 'utf8',
		'tablePrefix' 	=> 'edu_',
        'attributes' 	=> [
            // use a smaller connection timeout
            PDO::ATTR_TIMEOUT => 10,
        ],
    ],
    // 配置从服务器组
    'slaves' => [
        ['dsn' => 'mysql:host=localhost;dbname=muzi_edu'],
    ],
];

