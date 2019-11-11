<?php include ROOT . '/views/layouts/header_admin.php'; ?>

    <section>
        <div class="container">
            <div class="row">

                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Адмінпанель</a></li>
                        <li><a href="/admin/result">Керування результатами</a></li>
                        <li class="active">Редагувати результат</li>
                    </ol>
                </div>


                <h4>Редагувати результат #<?php echo $id; ?></h4>

                <br/>

                <div class="col-lg-4">
                    <div class="login-form">
                        <form action="#" method="post" enctype="multipart/form-data">

                            <p>Результат</p>
                            <input type="text" name="score" placeholder="" value="<?php echo $resultation['score']; ?>">

                            <p>Користувач</p>
                            <select name="id_user">
                                <?php if (is_array($userList)): ?>
                                    <?php foreach ($userList as $user): ?>
                                        <option value="<?php echo $user['id']; ?>"
                                            <?php if ($resultation['id_user'] == $user['id']) echo ' selected="selected"'; ?>>
                                            <?php echo $user['name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>

                            <p>Гра</p>
                            <select name="id_game">
                                <?php if (is_array($gameList)): ?>
                                    <?php foreach ($gameList as $game): ?>
                                        <option value="<?php echo $game['id_game']; ?>"
                                            <?php if ($resultation['id_game'] == $game['id_game']) echo ' selected="selected"'; ?>>
                                            <?php echo $game['name_game']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>

                            <br/><br/>



                            <input type="submit" name="submit" class="btn btn-default" value="Зберегти">

                            <br/><br/>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>