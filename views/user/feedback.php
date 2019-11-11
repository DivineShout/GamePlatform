<?php include ROOT . '/views/layouts/header.php'; ?>
    <section class="greeting">
        <section class="welcome">
                <center><h1>Заповніть поля!</h1></center>
                <div class="content-position">
                    <div class="form-look">
                        <form class="form" action="#" method="post" enctype="multipart/form-data">

                            <input class="register" type="text" placeholder="Email" name="email" value="<?php echo $email; ?>" />
                            <textarea class="feedback" cols="70" rows="100" type="text"  placeholder="Повідомленяя" name="message" value="<?php echo $message; ?>"></textarea>

<!--                            <center><label id="gtrg" class="feedback"><input class="feedback" type="file" name="image"/>Відправити повідомлення</label></center>-->
                            <br>

                            <center> <input type="submit" name="submit" class="butnlider" value="Відправити" /></center>
                        </form>
                    </div>
                </div>

        </section>

    </section>
<?php include ROOT . '/views/layouts/footer.php'; ?>