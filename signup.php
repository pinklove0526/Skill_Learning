<?php include 'includes/header.php'; ?>

        <div class="container mt-3">
            <?php if (isset($errorMsg)): ?>
                <div class="alert alert-danger" role="alert"><?php echo $errorMsg; ?></div>
            <?php endif; ?>
            <h3>Create a new account</h3>
            <div class="row">
                <form class="" action="login.php" method="POST">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Input your name..." value="<?php if (isset($username)) echo htmlspecialchars($username); ?>">
                    <p class="error"><?php if (isset($errors['create_username'])) echo $errors['create_username']; ?></p>
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Input your username..." value="<?php if (isset($email)) echo htmlspecialchars($email); ?>">
                    <p class="error"><?php if (isset($errors['create_email'])) echo $errors['create_email']; ?></p>
                    <label for="password1">Password</label>
                    <input type="password" name="password1" class="form-control" placeholder="Input your password..." value="">
                    <p class="error"></p>
                    <label for="password2">Confirm password</label>
                    <input type="password" name="password2" class="form-control" placeholder="Retype your password..." value="">
                    <p class="error"><?php if (isset($errors['create_password'])) echo $errors['create_password']; ?></p>
                    <button type="submit" name="create" class="btn btn-outline-success">Create account</button>
                </form>
            </div>
        </div>

<?php include 'includes/footer.php'; ?>