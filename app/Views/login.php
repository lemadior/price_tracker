<h1>Login</h1>

<form action="/login" method="POST">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" required />
    <br />
    <label for="password">Password</label>
    <input type="password" name="password" id="password" required />
    <br />
    <button type="submit">Login</button>
    <br />

    <a href="/register">Register</a>

    <?php if (isset($error)): ?>
        <p><?= $error ?></p>
    <?php endif; ?>
</form>
