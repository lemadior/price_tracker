<H1>Register</H1>

<form action="/register" method="POST">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" required>
    <br />
    <label for="password">Password</label>
    <input type="password" name="password" id="password" required>
    <br />
    <label for="password_confirmation">Confirm password</label>
    <input type="password" name="password_confirmation" id="password_confirmation" required>
    <br />
    <button type="submit">Register</button>

    <?php if (isset($error)): ?>
        <p><?= $error ?></p>
    <? endif; ?>
</form>
