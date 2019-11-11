<?php include ROOT . '/views/layouts/header.php'; ?>

    <section class="greeting">
        <section class="welcome">

            <br>
            <center><h1>Обери гру</h1></center>

            <div id="wrapper">

                <div class="toggles">
                    <button id="showall">Усі</button>
                    <?php foreach ($categorylist as $categoryItem):?>
                        <button id="<?php echo $categoryItem['id'];?>"><?php echo $categoryItem['name_category'];?></button>
                    <?php endforeach;?>

                </div>

                <div class="posts ">
                <?php foreach ($gameList as $gameItem):?>
                     <div class="<?php echo $gameItem['id_category'];?>  item post">
                        <a class="category_text"  href='/game/<?php echo $gameItem['id_game'] ;?>' ><?php echo $gameItem['name_game'];?>
                            <img  src="<?php $id_game = $gameItem['id_game']; echo Game::getImage($id_game); ?>" /></a>
                        <div class="overlay">
                            <a  href='/game/<?php echo $gameItem['id_game'] ;?>'><h4 class="description_text"><?php echo $gameItem['description'];?></h4></a>
                        </div>
                        </div>

                <?php endforeach;?>
                </div>
                <script>$(function() {

                        $('.toggles button').click(function(){
                            var get_id = this.id;
                            var get_current = $('.posts .' + get_id);

                            $('.post').not( get_current ).hide(500);
                            get_current.show(500);
                        });


                        $('#showall').click(function() {
                            $('.post').show(500);
                        });


                    }); </script>
            </div>
            <p>  &nbsp; </p>
        </section>

    </section>
<?php include ROOT . '/views/layouts/footer.php'; ?>