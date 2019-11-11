<?php foreach ($gameList as $gameItem):?>
    <div id="category_game" >
        <table>
            <thead></thead>
            <tr>
                <th><div class="linkGame"><a class="Gamelink" href='/game/<?php echo $gameItem['id_game'] ;?>'><?php echo $gameItem['name_game'];?></a></div></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td> <a  href='/game/<?php echo $gameItem['id_game'] ;?>'> <img  src="<?php $id_game = $gameItem['id_game']; echo Game::getImage($id_game); ?>" width="300" height="300"  alt="" /></a></td>
            </tr>
            </tbody>
        </table>


    </div>
<?php endforeach;?>