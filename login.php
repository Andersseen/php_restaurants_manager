<?php require('init.php'); ?>
<?php
$error = false;
$user = null;


if (isset($_POST['submit-login'])) {

    if (!check_hash('login', $_POST['hash'])) {
        die('con que hackeando ehhh¿?¿?');
    }

    if (empty($_POST['username']) && empty($_POST['password'])) {
        $error = true;
    } else if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $records = $conn->prepare('SELECT id, username, password FROM users WHERE username = :username');
        $records->bindParam(':username', $_POST['username']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';

        if (count($results) > 0 && $results['password']) {
            $_SESSION['user_id'] = $results['id'];
            redirect_to("index.php");
        } else {
            $message = 'Sorry, those credentials do not match';
        }
    }
    // if (isset($_POST['username']) && isset($_POST['password'])) {
    //     $username = $_POST['username'];
    //     $password = $_POST['password'];
    //     global $conn;
    //     $query = $conn->prepare('SELECT * FROM users WHERE username = :username AND password = :password');
    //     $query->execute(['username' => $username, 'password' => $password]);
    //     $row = $query->fetch(PDO::FETCH_NUM);
    //     if ($row) {
    //         //valor
    //         $role = $row[6];
    //         $_SESSION['role'] = $role;
    //         switch ($_SESSION['role']) {
    //             case 0:
    //                 redirect_to('index.php');
    //                 break;
    //             case 1:
    //                 redirect_to('index.php');
    //                 break;

    //             default:

    //                 break;
    //         }
    //     } else {
    //         //no existe
    //         echo 'El usario no existe';
    //     }
    // }
}

// if (is_logged_in()) {
//     redirect_to('index.php');
// }

?>

<?php require('templates/header.php'); ?>

<?php if (!empty($message)) : ?>
<p> <?= $message ?></p>
<?php endif; ?>

<h2>Login</h2>

<?php if ($error) : ?>
<div class="error">
    <?php echo 'Error de usuario o contraseña'; ?>
</div>
<?php endif; ?>

<form action="" method="post">
    <label for="username">Usuario</label>
    <input type="text" name="username" id="username">

    <label for="password">Contraseña</label>
    <input type="password" name="password" id="password">

    <input type="hidden" name="hash" value="<?php echo htmlspecialchars(generate_hash('login'), ENT_QUOTES); ?>">

    <p>
        <input type="submit" name="submit-login" value="Login">
    </p>
</form>

<?php require('templates/footer.php'); ?>