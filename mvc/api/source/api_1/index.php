<?php

/** http://localhost:8999/api */

$entity = [
    'kek' => 'cheburek',
    'lol' => [
        'foo' => 'bar'
    ]
];

echo json_encode($entity);