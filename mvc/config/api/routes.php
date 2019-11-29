<?php
/**
 * Routes API configuration
*/

return[
    'api/articles/(\d+)' => [\App\Blog\Controllers\Api\ArticleApiController::class, 'view'],
    'api/articles/add' => [\App\Blog\Controllers\Api\ArticleApiController::class, 'add'],
];


