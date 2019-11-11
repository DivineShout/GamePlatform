<?php include ROOT . '/views/layouts/header.php'; ?>
    <section class="greeting">
        <section class="welcome">
<?php if ($result): ?>
    <p>Ви зареєструвались!</p>
<?php else: ?>
    <?php if (isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li> - <?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <center><h1>Заповніть поля!</h1></center>
    <div class="content-position">
        <div class="form-look">
            <form class="form" action="#" method="post" enctype="multipart/form-data">

                <input class="register" type="text" placeholder="Ім'я" name="name" value="<?php echo $name; ?>" />
                <input class="register" type="text" placeholder="Прізвище" name="surname" value="<?php echo $surname; ?>" />
                <input class="register" type="date" placeholder="Дата народження" name="data_birth" value="<?php echo $data_birth; ?>"  />
                <input id="data_r" class="register" type="text" placeholder="Нік" name="nick"  value="<?php echo $nick; ?>" />

                <input id="file" class="register" type="email" placeholder="Електронна адреса" name="email"  value="<?php echo $email; ?>" />
                <input class="register" type="password" placeholder="Пароль" name="password" value="<?php echo $password; ?>" />
                <center><label id="gtrg" class="register"><input class="register" type="file" name="image"/>Завантажити свое зображення</label></center>
                <br>

               <center> <input type="submit" name="submit" class="butnlider" value="Реєстрація" /></center>
            </form>
        </div>
    </div>


<?php endif; ?>
        </section>

    </section>
<?php include ROOT . '/views/layouts/footer.php'; ?>