<?php require_once('private/initialize.php'); ?>
<?php $page_title = "Recept aanpassen";

$id = $_SESSION['id'];
$result = findUserByID($id);

?>

<!-- Header -->
<?php include(SHARED_PATH . '/normal_header.php'); ?>

<!-- Main -->
<?php include(SHARED_PATH . '/main_start.php'); ?>



<?php include(SHARED_PATH . '/main_end.php'); ?>

<!-- Footer -->
<?php include(SHARED_PATH . '/normal_footer.php'); ?>