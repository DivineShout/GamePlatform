<?php include ROOT . '/views/layouts/header.php'; ?>
    <section class="greeting">
        <section class="welcome" style="height: 700px">
            <div style="float: left">
            <div >
            <center><h1><?php echo $gameItem['name_game'];?></h1></center></div>
            <iframe id="sss" style="border-radius: 1%; margin-left: 5%" src="/views/game/<?php echo $gameItem['id_game'];?>.php"   width="632" height="528" seamless>
                <h2><a href='/game/<?php echo $gameItem['id_game'] ;?>'><?php echo $gameItem['name_game'].' # '.$gameItem['id_game'];?></a></h2>


            </iframe></div>




            <table class="table_record"   >
                <thead class="name_table">
                <tr><?php foreach ($gamePerson as $game2): ?>
                    <th>Місце</th>
                    <th>Твій рекорд, <?php echo $game2['Nick']; ?></th></tr>
                </thead>
                <tbody class="tbody_record">
                <tr><td><?php echo $game2['Position']; ?></td>
                    <td><?php echo $game2['Score']; ?></td></tr>
                <?php endforeach; ?>


                </tbody></table>
            <table class="table_record"  >
                <thead class="name_table">
                <tr>
                    <th>Місце</th>
                    <th>Нік</th>
                    <th>Рахунок</th>

                </tr>
                </thead>
                <tbody class="tbody_record">
                <?php  $i=0;?>
                <?php foreach ($gameTurnir as $game): ?>
                    <?php $i++ ;?>
                    <tr>
                        <td><?php  echo $i;  ?></td>

                        <td><?php echo $game['Nick']; ?></td>
                        <td><?php echo $game['Score']; ?></td>



                    </tr>

                <?php endforeach; ?>
                </tbody>
            </table>
            <script>
                function incomingValue(val) {
                    document.getElementById('sqw').value = val;
                    document.getElementById('sqe').click();
                }

            </script>

            <form action="#" method="post" enctype="multipart/form-data" style="display: none"  target="frame">
                <input id="sqw" type="text" name="score" placeholder=""   >

                <input type="text" name="id_user" placeholder="" value="<?php echo $_SESSION['user']; ?>">
                <input type="text" name="id_game" placeholder="" value="<?php echo $gameItem['id_game']; ?>">
                <input id="sqe" type="submit" name="submit" class="btn btn-default" value="Сохранить"/>>
            </form>
            <iframe name="frame" style="display: none"></iframe>
            <p>  &nbsp;<br>&nbsp; </p>
        </section>
    </section>
<?php include ROOT . '/views/layouts/footer.php'; ?>