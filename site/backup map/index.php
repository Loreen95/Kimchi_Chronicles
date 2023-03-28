<?php require_once('private/initialize.php'); ?>
<?php $page_title = "Home"; 

$result = recentAdd();
?>

<!-- Header -->
<?php include(SHARED_PATH . '/normal_header.php'); ?>

<!-- Main -->
<?php include(SHARED_PATH . '/main_start.php'); ?>
<h1 class="articleTitle">Recente uploads</h1>


<div class="row">
    <?php foreach ($result as $recipe) { ?>
        <div class="column">
            <div class="card">
                <h2><?php echo $recipe['title']; ?> </h2>
                <h4><?php echo $recipe['added'];?></h4>
                <img src="public/images/<?php echo $recipe['image']; ?>" />
                <a href="<?php echo 'recipe.php?id=' . $recipe['id']; ?> "><button>Lees recept</button></a>
            </div>
        </div>
    <?php } ?>
</div>


<?php include(SHARED_PATH . '/main_end.php'); ?>

<!-- Footer -->
<?php include(SHARED_PATH . '/normal_footer.php'); ?>