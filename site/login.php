<?php require_once('private/initialize.php'); ?>
<?php $page_title = "Inloggen";

if (isset($_SESSION['id'])) {
    redirect_to("index.php");
} else {
    if (is_post_request()) {
        $user = [];
        $user['email'] = $_POST['email'];
        $user['password'] = $_POST['password'];

        if (trim($user['email']) == "" && trim($user['password']) == "") {
            $error = "Vul alle velden in.";
        } elseif (trim($user['email']) == "") {
            $error = "Vul je e-mail adres in.";
        } elseif (trim($user['password']) == "") {
            $error = "Vul je wachtwoord in.";
        } else {
            $result = findUser($user);

            // Email vergelijken
            if ($user['email'] != $result['email']) {
                $error = "Het emailadres is niet geldig.";
                // Wachtwoord vergelijken
            } else if ($user['password'] != $result['password']) {
                $error = "Het wachtwoord is onjuist.";
            } else {
                // Gebruiker doorsturen
                $_SESSION['id'] = $result['id'];
                $_SESSION['user'] = $result;
                redirect_to("index.php");
            }
        }
    }
}

?>

<!-- Header -->
<?php include(SHARED_PATH . '/normal_header.php'); ?>

<!-- Main -->
<?php include(SHARED_PATH . '/main_start.php'); ?>

<div class="formcontainer">
    <h2 class="registerTitle">Inloggen</h2>

    <?php
    if (isset($error)) { ?>
        <div class="errors">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <form method="post">
        <div class="input-icons">
            <i class="fa fa-envelope icon">
            </i>
            <input class="input-field" type="text" placeholder="Email" name="email">
        </div>

        <div class="input-icons">
            <i class="fa fa-key icon">
            </i>
            <input class="input-field" type="password" placeholder="Password" name="password">
        </div>
        <input class=" input-field" type="submit">
    </form>
</div>

<?php include(SHARED_PATH . '/main_end.php'); ?>

<!-- Footer -->
<?php include(SHARED_PATH . '/normal_footer.php'); ?>