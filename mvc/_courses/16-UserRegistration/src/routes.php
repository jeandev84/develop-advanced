<?php
/**
 * Routes configuration
*/

return [
    'articles/(\d+)' => [\Blog\Controllers\ArticleController::class, 'view'],
    'articles/add' => [\Blog\Controllers\ArticleController::class, 'add'],
    'articles/(\d+)/edit' => [\Blog\Controllers\ArticleController::class, 'edit'],
    'users/register' => [\Blog\Controllers\UserController::class, 'signUp'],
    '' => [\Blog\Controllers\MainController::class, 'main'],
];


/*
return [
    '~^hello/(.*)$~' => [\Blog\Controllers\MainController::class, 'sayHello'],
    '~^articles/(\d+)$~' => [\Blog\Controllers\ArticleController::class, 'view'],
    '~^articles/(\d+)/edit$~' => [\Blog\Controllers\ArticleController::class, 'edit'],
    '~^$~' => [\Blog\Controllers\MainController::class, 'main'],
];

return [
    'articles/(\d+)' => [\Blog\Controllers\ArticleController::class, 'view'],
    'articles/(\d+)' => [\Blog\Controllers\ArticleController::class, 'view'],
    'hello/(.*)' => [\Blog\Controllers\MainController::class, 'sayHello'],
    '' => [\Blog\Controllers\MainController::class, 'main'],
];
*/
