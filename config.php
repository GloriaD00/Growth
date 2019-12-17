<?php
return [

    'database'=>[

        'name'=>'DANAME',
        'user'=>'DBUSER',
        'password'=>'DBPASSWORD',
        'connection'=>'mysql:host=localhost',
        'port'=>'8000',
        'options'=>[

            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
        ]


    ]

];

