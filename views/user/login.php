<?php include ROOT . '/views/layouts/header.php'; ?>
<section class="greeting">
    <section class="welcome">
        <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li> - <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <div class="content-position">
            <div class="form-look">

                <h1>Заповніть данні для входу!</h1>
                <form action="#" method="post"><br>
                    <input id="file" class="register" type="email" placeholder="Електронна адреса" name="email"  value="<?php echo $email; ?>" />
                    <input class="register" type="password" placeholder="Пароль" name="password" value="<?php echo $password; ?>" />
<br><br><br>
                    <center> <input type="submit" name="submit" class="butnlider" value="Вхід" /></center>

                </form>
            </div>
        </div>
    </section>
</section>
<?php include ROOT . '/views/layouts/footer.php'; ?>





