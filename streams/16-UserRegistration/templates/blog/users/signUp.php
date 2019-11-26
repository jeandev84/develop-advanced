<?php include __DIR__.'/../partials/header.php'; ?>
<div style="text-align: center;">
    <h1>Регистрация</h1>
    <?php if (!empty($error)): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>
    <form action="/users/register" method="post">
        <label>
            Nickname
            <input type="text" name="nickname" value="<?= $_POST['nickname'] ?? ''; ?>">
        </label>
        <br><br>
        <label>
            Email
            <input type="text" name="email" value="<?= $_POST['email'] ?? ''; ?>">
        </label>
        <br><br>
        <label>
            Пароль
            <input type="password" name="password" value="<?= $_POST['password'] ?? ''; ?>">
        </label>
        <br><br>
        <input type="submit" value="Регистрироваться">
    </form>
</div>
<?php include __DIR__.'/../partials/footer.php'; ?>
