<?php require_once('private/initialize.php'); ?>
<?php $page_title = "Gegevens aanpassen";

$id = $_SESSION['id'];
$result = findUserByID($id);

?>

<!-- Header -->
<?php include(SHARED_PATH . '/normal_header.php'); ?>

if ($recipe['author'] == $_SESSION['id'] || $_SESSION['user']['role'] == "administrator") { ?>
<!-- Main -->
<?php include(SHARED_PATH . '/main_start.php'); ?>

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

        <input class=" input-field" type="submit">
    </form>
</div>

<?php include(SHARED_PATH . '/main_end.php'); ?>

<!-- Footer -->
<?php include(SHARED_PATH . '/normal_footer.php'); ?>