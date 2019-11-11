<?php include ROOT . '/views/layouts/header_admin.php'; ?>

    <section>
        <div class="container">
            <div class="row">

                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Адмінпанель</a></li>
                        <li><a href="/admin/home">Керування головною сторінкою</a></li>
                        <li class="active">Додати головну</li>
                    </ol>
                </div>


                <h4>Додати головну</h4>

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



                            <p>Заголовок</p>
                            <input type="text" name="name" placeholder="" value="">
                            <p>Текст</p>
                            <textarea id="editor1"  cols="50" rows="35" type="text" name="content" placeholder="" value=""></textarea>

                            <script type="text/javascript">
                                var ckeditor1 = CKEDITOR.replace( 'editor1' );
                                AjexFileManager.init({
                                    returnTo: 'ckeditor',
                                    editor: ckeditor1
                                });
                            </script>

                            <p>Головне зображення</p>
                            <input type="file" name="image1" placeholder="" value="">

                            <p>Допоміжне зображення</p>
                            <input type="file" name="image2" placeholder="" value="">


                            <br><br>

                            <input type="submit" name="submit" class="btn btn-default" value="Зберегти">
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>