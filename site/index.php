<?php require_once('private/initialize.php'); ?>
<?php $page_title = "Home";

$result = recentAdd(); ?>


<?php include(SHARED_PATH . '/normal_header.php'); ?>

<!-- Main -->
<?php include(SHARED_PATH . '/main_start.php'); ?>


<img class="mainImg" src="public/images/background-image.jpg" />
<form class="example" action="action_page.php">
        <input type="text" placeholder="Recept of ingrediënt" name="search">
        <button type="submit"><i class="fa fa-search"></i></button>
</form>


<div class="newEntry">
    <h1>Nieuwste Recepten</h1>
    <div class="row">
        <?php foreach ($result as $recipe) { ?>
            <div class="column">
                <div class="card">
                    <h2><?php echo $recipe['title']; ?> </h2>
                    <img src="public/images/<?php echo $recipe['image']; ?>" />
                    <a href="<?php echo 'recipe.php?id=' . $recipe['id']; ?> "><button>Lees recept</button></a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>


<?php include(SHARED_PATH . '/main_end.php'); ?>

<!-- Footer -->
<?php include(SHARED_PATH . '/normal_footer.php'); ?>