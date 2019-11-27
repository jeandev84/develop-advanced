<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Мой блог</title>
    <link rel="stylesheet" href="/assets/css/app.css">
</head>
<body>

<table class="layout">
    <tr>
        <td colspan="2" class="header">
            <a href="/" style="text-decoration: none;color: #888;">Блог - программиста</a>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: right">
            <?php if(!empty($user)): ?>
               <?= 'Привет, ' . $user->getNickname() ?>| <a href="/users/logout">Выйти</a>
            <?php else: ?>
                <a href="/users/login">Войти</a>
                <a href="/users/register">Регистрация</a>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td>