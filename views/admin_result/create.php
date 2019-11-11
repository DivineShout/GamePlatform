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


                <h4>Додати новий результат</h4>

                <br/>

                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <div class="col-lg-4">
                    <div class="login-form">
                        <form action="#" method="post" enctype="multipart/form-data">



                            <p>Результат</p>
                            <input type="text" name="score" placeholder="" value="">


                            <p>Користувач</p>
                            <select name="id_user">
                                <?php if (is_array($userList)): ?>
                                    <?php foreach ($userList as $user): ?>
                                        <option value="<?php echo $user['id']; ?>">
                                            <?php echo $user['nick']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <br/><br/>
                            <p>Гра</p>
                            <select name="id_game">
                                <?php if (is_array($gameList)): ?>
                                    <?php foreach ($gameList as $game): ?>
                                        <option value="<?php echo $game['id_game']; ?>">
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