<?php
return [

    'database'=>[

        'name'=>'DBNAME',
        'user'=>'USER',
        'password'=>'PASSWORD',
        'connection'=>'mysql:host=localhost',
        'port'=>'8000',
        'options'=>[

            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
        ]


    ]

];

