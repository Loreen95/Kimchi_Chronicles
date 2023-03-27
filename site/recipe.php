<?php require_once('private/initialize.php'); ?>
<?php $page_title = "Recept";

$id = $_GET['id'] ?? '1';
$result = findRecipe($id);

?>

<!-- Header -->
<?php include(SHARED_PATH . '/normal_header.php'); ?>

<!-- Main -->
<?php include(SHARED_PATH . '/main_start.php'); ?>
<h1>Ingrediëntenlijst</h1>
<div id="content">
    <a class="terug-link" href="index.php">&laquo; Terug</a>
</div>
<table class="tabel">
    <tr>
        <th>Gerecht</th>
        <th>Ingrediënten</th>
        <th>Instructies</th>
        <th>Foto</th>
        <th>Moeilijkheidsgraad</th>
        <th>Duratie</th>
        <th>Gang</th>
        <th>Actie</th>
    </tr>
    <?php foreach ($result as $recipe) { ?>
        <tr>
            <td>
                <h4><?php echo $recipe['title']; ?></h4>
            </td>
            <td><?php echo $recipe['name'];?></td>
            <td><?php echo $recipe['steps'];?></td>
            <td><img src="public/images/<?php echo $recipe['image']; ?>" style="height: 200px; width:250px;" /></td>
            <td><?php echo $recipe['difficulty']; ?></td>
            <td><?php echo $recipe['duration']; ?></td>
            <td><?php echo $recipe['course']; ?></td>
            <td>
                <?php if (!isset($_SESSION['id']) || $_SESSION['id'] != $recipe['author']) { ?>
                    <h5>Geen acties beschikbaar.</h5>
                <?php } else { ?>
                    <a href="recipe_edit.php?id=<?php echo $id; ?>">Aanpassen</a>
            <?php }
            } ?>
            </td>
        </tr>
</table>

<?php include(SHARED_PATH . '/main_end.php'); ?>

<!-- Footer -->
<?php include(SHARED_PATH . '/normal_footer.php'); ?>