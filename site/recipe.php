<?php require_once('private/initialize.php'); ?>
<?php $page_title = "Home";

$id = $_GET['id'] ?? '1';
$result = findRecipe($id);

?>

<!-- Header -->
<?php include(SHARED_PATH . '/normal_header.php'); ?>

<!-- Main -->
<?php include(SHARED_PATH . '/main_start.php'); ?>

<div id="content">
    <a class="terug-link" href="index.php">&laquo; Terug</a>
</div>

<table>
    <tr>
        <th>test</th>
    </tr>
    <?php foreach ($result as $recipe) { ?>
        <tr>
            <td><?php echo $recipe['title']; ?></td>
            <td><img src="public/images/<?php echo $recipe['image']; ?>" style="width: 70%;" /></td>
        </tr>
    <?php } ?>
</table>

<?php include(SHARED_PATH . '/main_end.php'); ?>

<!-- Footer -->
<?php include(SHARED_PATH . '/normal_footer.php'); ?>