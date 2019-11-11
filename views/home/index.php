<?php include ROOT . '/views/layouts/header.php'; ?>

<section class="greeting">
    <section class="welcome">
        <?php foreach ($home as $homeItem):?>
        <h1><?php echo $homeItem['name'];?></h1>
        <p><?php echo $homeItem['content'];?></p>
        <div>
            <?php if (User::isGuest()):?>
                <a href="/user/register/" class="butnlider">Реєстрація</a>
                <a href="/game/" class="butnlider">Ігри</a>
            <?php else: ?>
                <a href="/game/" class="butnlider">Ігри</a>

            <?php endif; ?>

        </div>

        <img class="preview-image-main" src="<?php $id = $homeItem['id']; echo Home::getImage1($id); ?>" alt="Main Preview Image" width="230" height="220">
        <img class="preview-image-secondary" src="<?php  echo Home::getImage2($id); ?>" alt="Secondary Preview Image" width="230" height="220">
        <?php endforeach;?>
    </section>

</section>
<?php include ROOT . '/views/layouts/footer.php'; ?>
