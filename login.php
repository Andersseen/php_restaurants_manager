<?php require('init.php'); ?>
<?php
$error = false;
$user = null;


if (isset($_POST['submit-login'])) {

    if (!check_hash('login', $_POST['hash'])) {
        die('con que hackeando ehhh¿?¿?');
    }

    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = true;
    } else if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $records = $conn->prepare('SELECT id, username, password FROM users WHERE username = :username');
        $records->bindParam(':username', $_POST['username']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';

        if ($results == null) {
            $error = true;
        } elseif (count($results) > 0 && $results['password']) {
            $_SESSION['user_id'] = $results['id'];
            redirect_to("index.php");
        }
        $message = 'Sorry, those credentials do not match';
        $error = true;
    }
}


?>

<?php require('templates/header.php'); ?>

<?php if (!empty($message)) : ?>
<p> <?= $message ?></p>
<?php endif; ?>

<h2>Login</h2>

<?php if ($error) : ?>
<div class="alert alert-danger" role="alert">
    <?php echo 'Error de usuario o contraseña'; ?>
</div>
<?php endif; ?>

<form action="" method="post">

    <div class="mb-3">
        <label for="username" class="form-label">Usuario</label>
        <input type="text" class="form-control" name="username" id="username">
    </div>
    <input type="hidden" name="hash" value="<?php echo htmlspecialchars(generate_hash('login'), ENT_QUOTES); ?>">
    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>
    <div class="col-auto">
        <input type="submit" name="submit-login" class="btn btn-warning" value="Login">
    </div>
</form>

<?php require('templates/footer.php'); ?>