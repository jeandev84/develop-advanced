<?php
/**
 * Routes configuration
*/

/*
return [
    '~^hello/(.*)$~' => [\Blog\Controllers\MainController::class, 'sayHello'],
    '~^$~' => [\Blog\Controllers\MainController::class, 'main'],
];
*/

return [
    'hello/(.*)' => [\Blog\Controllers\MainController::class, 'sayHello'],
    '' => [\Blog\Controllers\MainController::class, 'main'],
];