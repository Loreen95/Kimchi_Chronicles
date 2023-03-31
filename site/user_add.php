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
        $error = "Vul een voornaam in.";
    } elseif (trim($user['lastname']) == "") {
        $error = "Vul een achternaam in.";
    } elseif (trim($user['email']) == "") {
        $error = "Vul een e-mail adres in.";
    } elseif (trim($user['password']) == "") {
        $error = "Vul een wachtwoord in.";
    } elseif (trim($user['password2']) == "") {
        $error = "Vul een wachtwoord nog een keer in.";
    } elseif ($user['password'] != $user['password2']) {
        $error = "De wachtwoorden zijn niet gelijk!";
    } else {
        $result = findUserByID($user);

        if ($user['email'] != $result['email']) {
            $result = addUser($user, $hashed_password);
            redirect_to("index.php");
        } else {
            $error = "Dit emailadres bestaat al. <a href='login.php'>inloggen</a>?";
        }
    }
}

?>

<div class="formcontainer">
    <h2 class="registerTitle">Gebruiker toevoegen</h2>

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
            <input class="input-field" type="text" placeholder="Voornaam" name="firstname">
        </div>

        <div class="input-icons">
            <i class="fa fa-user icon">
            </i>
            <input class="input-field" type="text" placeholder="Achternaam" name="lastname">
        </div>

        <div class="input-icons">
            <i class="fa fa-envelope icon">
            </i>
            <input class="input-field" type="text" placeholder="Email" name="email">
        </div>

        <div class="input-icons">
            <i class="fa fa-key icon">
            </i>
            <input class="input-field" type="password" placeholder="Wachtwoord" name="password">
        </div>
        <div class="input-icons">
            <i class="fa fa-key icon">
            </i>
            <input class="input-field" type="password" placeholder="Verifieer wachtwoord" name="password2">
        </div>

        <input class=" input-field" type="submit">
    </form>
</div>