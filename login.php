<?php include 'includes/header.php'; ?>

        <div class="container mt-3">
            <?php if (isset($errorMsg)): ?>
                <div class="alert alert-danger" role="alert"><?php echo $errorMsg; ?></div>
            <?php endif; ?>
            <h3>Login</h3>
            <div class="row">
                <form class="" action="login.php" method="POST">
                    <label for="username">Username</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter your username..." value="<?php if (isset($name)) echo htmlspecialchars($name); ?>">
                    <p class="error"><?php if (isset($errors['login_username'])) echo $errors['login_username']; ?></p>
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password..." value="">
                    <p class="error"><?php if (isset($errors['login_password'])) echo $errors['login_password']; ?></p>
                    <button type="submit" name="login" class="btn btn-outline-primary">Login</button>
                </form>
            </div>
        </div>

<?php include 'includes/footer.php'; ?>