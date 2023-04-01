<?php require_once('private/initialize.php'); ?>
<?php $page_title = "Ingrediënten";

$result = allIngredients();
?>

<!-- Header -->
<?php include(SHARED_PATH . '/normal_header.php'); ?>

<!-- Main -->
<?php include(SHARED_PATH . '/main_start.php'); ?>

<div id="content">
    <a class="terug-link" href="index.php">&laquo; Terug</a>
</div>

<?php
if (!$result) { ?>
    <h1>Er zijn nog geen ingrediënten toegevoegd</h1>
<?php } ?>

<table class="tabel">
    <tr>
        <th>
            <h1>Ingrediëntenlijst</h1>
        </th>
    </tr>
    <?php foreach ($result as $ingredient) { ?>
        <tr>
            <td><?php echo $ingredient['name']; ?></td>
        <?php } ?>
        </tr>
</table>


<?php include(SHARED_PATH . '/main_end.php'); ?>

<!-- Footer -->
<?php include(SHARED_PATH . '/normal_footer.php'); ?>