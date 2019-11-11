<?php include ROOT . '/views/layouts/header.php'; ?>
<section class="greeting">
    <section class="welcome" style="height: 600px">
        <center><h1>Особистий кабінет</h1></center>
<div>
        <div class="profile_sructur" style="margin-top: 10px; margin-left: 20%; ">
            <div class="profile-image"><img class="img_not_welcome" src="<?php  $id = $user['id']; echo User::getImage($id); ?>"  ></div>
            <div class="backround_profile">
                <h3 class="h3_cabinet"><?php echo $user['name'];?>  <?php echo $user['surname'];?></h3>
                <h4 class="h4_cabinet"><?php echo $user['nick'];?></h4>
                <h4 class="h4_cabinet"><?php echo $user['data_birth'];?></h4>
            </div>

        </div>




        <table class="table_record_cabinet"  >
            <thead class="name_table">
            <tr>
                <th>Місце</th>
                <th>Гра</th>
                <th>Рахунок</th>

            </tr>
            </thead>
            <tbody class="tbody_record">

            <?php foreach ($record_person as $game): ?>

                <tr>
                    <td><?php echo $game['Rang']; ?></td>

                    <td><?php echo $game['Game']; ?></td>
                    <td><?php echo $game['Score']; ?></td>



                </tr>

            <?php endforeach; ?>
            </tbody>
        </table>

</div>
        <div style="float: right;margin-top: 1%; margin-right: 50%  ">
            <a href="/cabinet/edit/" class="butnlider">Редагувати дані</a>
            <a href="/user/logout/" class="butnlider">Вихід</a><br><br>
            <?php if (User::checkAdminButton()):?>
                <a style="margin-left: 25%" href="/admin/" class="butnlider">Адмінпанель</a>
            <?php else: ?>


            <?php endif; ?>

        </div>
        <p>  &nbsp; </p><br> <p>  &nbsp; </p>
    </section>

</section>
<?php include ROOT . '/views/layouts/footer.php'; ?>


