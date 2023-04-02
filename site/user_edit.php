<?php

$id = $_GET['user_edit_id'];
$user = findUserByID($id);
if (is_post_request()) {
    $firstname = !empty($_POST['firstname']) ? $_POST['firstname'] : $user['first_name'];
    $lastname = !empty($_POST['lastname']) ? $_POST['lastname'] : $user['last_name'];
    $email = !empty($_POST['email']) ? $_POST['email'] : $user['email'];
    $password = !empty($_POST['password']) ? $_POST['password'] : $user['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $edit = editUser($firstname, $lastname, $email, $hashed_password, $id);
}

?>
<div class="formcontainer">
    <h2 class="registerTitle">Gegevens aanpassen</h2>

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
            <input class="input-field" type="text" placeholder="<?php echo $user['first_name']; ?>" name="firstname" required pattern="[A-Za-z]+" maxlength="50">
        </div>

        <div class="input-icons">
            <i class="fa fa-user icon">
            </i>
            <input class="input-field" type="text" placeholder="<?php echo $user['last_name']; ?>" name="lastname" required pattern="[A-Za-z]+" maxlength="50">
        </div>

        <div class="input-icons">
            <i class="fa fa-envelope icon">
            </i>
            <input class="input-field" type="text" placeholder="<?php echo $user['email']; ?>" name="email" required>
        </div>

        <div class="input-icons">
            <i class="fa fa-key icon">
            </i>
            <input class="input-field" type="password" placeholder="Wachtwoord" name="password" required pattern="^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z0-9!@#$%^&*]{8,}$">
        </div>

        <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">

        <div class="input-icons">
            <i class="fa-solid fa-turn-up icon"></i>
            <select class="input-field" name="role">
                <option value="" selected disabled>Verander de rol</option>
                <option value="user">Gebruiker</option>
                <option value="administrator">Administrator</option>
            </select>
        </div>

        <input class="input-field" type="submit">
    </form>
</div>