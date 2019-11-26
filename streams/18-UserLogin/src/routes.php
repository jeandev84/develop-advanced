<?php
/**
 * Routes configuration
*/

return [
    'articles/(\d+)' => [\Blog\Controllers\ArticleController::class, 'view'],
    'articles/add' => [\Blog\Controllers\ArticleController::class, 'add'],
    'articles/(\d+)/edit' => [\Blog\Controllers\ArticleController::class, 'edit'],
    'users/register' => [\Blog\Controllers\UserController::class, 'signUp'],
    'users/(\d+)/activate/(.+)' => [\Blog\Controllers\UserController::class, 'activate'],
    'users/login' => [\Blog\Controllers\UserController::class, 'login'],
    '' => [\Blog\Controllers\MainController::class, 'main'],
];

