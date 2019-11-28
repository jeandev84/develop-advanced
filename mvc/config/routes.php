<?php
/**
 * Routes configuration
*/

return [
    'articles/(\d+)' => [\App\Blog\Controllers\ArticleController::class, 'view'],
    'articles/add' => [\App\Blog\Controllers\ArticleController::class, 'add'],
    'articles/(\d+)/edit' => [\App\Blog\Controllers\ArticleController::class, 'edit'],
    'users/register' => [\App\Blog\Controllers\UserController::class, 'signUp'],
    'users/(\d+)/activate/(.+)' => [\App\Blog\Controllers\UserController::class, 'activate'],
    'users/login' => [\App\Blog\Controllers\UserController::class, 'login'],
    '' => [\App\Blog\Controllers\MainController::class, 'main'],
];

