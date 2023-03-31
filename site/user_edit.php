<?php

$id = $_GET['edit_id'];
$result = findUserByID($id);
foreach ($result as $user) {
if (is_post_request()) {
    $firstname = !empty($_POST['firstname']) ? $_POST['firstname'] : $user['first_name'];
    $lastname = !empty($_POST['lastname']) ? $_POST['lastname'] : $user['last_name'];
    $email = !empty($_POST['email']) ? $_POST['email'] : $user['email'];
    $password = !empty($_POST['password']) ? $_POST['password'] : $user['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $edit = editUser($firstname, $lastname, $email, $hashed_password, $id);

}}
?>
<div class="formcontainer">
    <h2 class="registerTitle">Gegevens aanpassen</h2>

    <?php
    if (isset($error)) { ?>
        <div class="errors">
            <?php echo $error; ?>
        </div>
    <?php } ?>

<?php foreach($result as $user){ ?>
    <form method="post">
        <div class="input-icons">
            <i class="fa fa-user icon">
            </i>
            <input class="input-field" type="text" placeholder="<?php echo $user['first_name']; ?>" name="firstname">
        </div>

        <div class="input-icons">
            <i class="fa fa-user icon">
            </i>
            <input class="input-field" type="text" placeholder="<?php echo $user['last_name']; ?>" name="lastname">
        </div>

        <div class="input-icons">
            <i class="fa fa-envelope icon">
            </i>
            <input class="input-field" type="text" placeholder="<?php echo $user['email']; ?>" name="email">
        </div>

        <div class="input-icons">
            <i class="fa fa-key icon">
            </i>
            <input class="input-field" type="password" placeholder="Wachtwoord" name="password">
        </div>

        <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">

        <input class="input-field" type="submit">
    </form>
    <?php } ?>
</div>