<?php require_once('private/initialize.php'); ?>
<?php $page_title = "Registreren"; ?>

<!-- Header -->
<?php include(SHARED_PATH . '/normal_header.php'); ?>

<!-- Main -->
<?php include(SHARED_PATH . '/main_start.php'); ?>

<div class="formcontainer">
    <h2 class="registerTitle">Registreren</h2>

    <?php if ($errors) { ?>
        <div class="errors">
            <ul>
                <li> <?php echo $errors; ?> </li>
            </ul>
        </div>
    <?php } ?>

    <form action="register.php" method="post">
        <div class="input-icons">
            <i class="fa fa-user icon">
            </i>
            <input class="input-field" type="text" placeholder="Voornaam">
        </div>

        <div class="input-icons">
            <i class="fa fa-user icon">
            </i>
            <input class="input-field" type="text" placeholder="Achternaam">
        </div>

        <div class="input-icons">
            <i class="fa fa-envelope icon">
            </i>
            <input class="input-field" type="text" placeholder="Email">
        </div>

        <div class="input-icons">
            <i class="fa fa-key icon">
            </i>
            <input class="input-field" type="password" placeholder="Password">
        </div>

        <input class="input-field" type="submit">
    </form>
</div>

<?php include(SHARED_PATH . '/main_end.php'); ?>

<!-- Footer -->
<?php include(SHARED_PATH . '/normal_footer.php'); ?>