<?php
/**
 * Routes configuration
*/

/*
return [
    '~^hello/(.*)$~' => [\Blog\Controllers\MainController::class, 'sayHello'],
    '~^articles/(\d+)$~' => [\Blog\Controllers\ArticleController::class, 'view'],
    '~^$~' => [\Blog\Controllers\MainController::class, 'main'],
];
*/

return [
    'articles/(\d+)' => [\Blog\Controllers\ArticleController::class, 'view'],
    'hello/(.*)' => [\Blog\Controllers\MainController::class, 'sayHello'],
    '' => [\Blog\Controllers\MainController::class, 'main'],
];