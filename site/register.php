<?php require_once('private/initialize.php'); ?>
<?php $page_title = "Registreren"; ?>

<?php

if (is_post_request()) {
    $user = [];
    $user['firstname'] = $_POST['firstname'] ?? '';
    $user['lastname'] = $_POST['lastname'] ?? '';
    $user['email'] = $_POST['email'] ?? '';
    $user['password'] = $_POST['password'] ?? '';
    $user['password2'] = $_POST['password2'] ?? '';
    $hashed_password = password_hash($user['password'], PASSWORD_DEFAULT);

    if (trim($user['firstname']) == "" && trim($user['lastname']) == "" && trim($user['email']) == "" && trim($user['password']) == "" && trim($user['password2']) == "") {
        $error = "Vul alle velden in.";
    } elseif (trim($user['firstname']) == "") {
        $error = "Vul je voornaam in.";
    } elseif (trim($user['lastname']) == "") {
        $error = "Vul je achternaam in.";
    } elseif (trim($user['email']) == "") {
        $error = "Vul je e-mail adres in.";
    } elseif (trim($user['password']) == "") {
        $error = "Vul je wachtwoord in.";
    } elseif (trim($user['password2']) == "") {
        $error = "Vul je wachtwoord nog een keer in.";
    } elseif ($user['password'] != $user['password2']) {
        $error = "De wachtwoorden zijn niet gelijk!";
    } else {
        $result = findUserByID($user);

        if ($user['email'] != $result['email']) {
            $result = addUser($user, $hashed_password);
            redirect_to("login.php");
        } else {
            $error = "Dit emailadres bestaat al. <a href='login.php'>inloggen</a>?";
        }
    }
}

?>

<!-- Header -->
<?php include(SHARED_PATH . '/normal_header.php'); ?>

<!-- Main -->
<?php include(SHARED_PATH . '/main_start.php'); ?>

<div class="formcontainer">
    <h2 class="registerTitle">Registreren</h2>

    <?php
    if (isset($error)) { ?>
        <div class="errors">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <form method="post">
        <div class="input-icons">
            <i class="fa fa-user icon">
            </i>
            <input class="input-field" type="text" placeholder="Voornaam" name="firstname" required pattern="[A-Za-z]+" maxlength="50">
        </div>

        <div class="input-icons">
            <i class="fa fa-user icon">
            </i>
            <input class="input-field" type="text" placeholder="Achternaam" name="lastname" required pattern="[A-Za-z]+" maxlength="50">
        </div>

        <div class="input-icons">
            <i class="fa fa-envelope icon">
            </i>
            <input class="input-field" type="text" placeholder="Email" name="email" required>
        </div>

        <div class="input-icons">
            <i class="fa fa-key icon">
            </i>
            <input class="input-field" type="password" placeholder="Wachtwoord" name="password" required pattern="^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z0-9!@#$%^&*]{8,}$">
        </div>
        <div class="input-icons">
            <i class="fa fa-key icon">
            </i>
            <input class="input-field" type="password" placeholder="Verifieer wachtwoord" name="password2" required pattern="^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z0-9!@#$%^&*]{8,}$">
        </div>

        <input class=" input-field" type="submit">
    </form>
</div>

<?php include(SHARED_PATH . '/main_end.php'); ?>

<!-- Footer -->
<?php include(SHARED_PATH . '/normal_footer.php'); ?>