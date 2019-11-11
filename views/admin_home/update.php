<?php include ROOT . '/views/layouts/header_admin.php'; ?>

    <section>
        <div class="container">
            <div class="row">

                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Адмінпанель</a></li>
                        <li><a href="/admin/home">Керування головною сторінкою</a></li>
                        <li class="active">Редагувати головну сторінку</li>
                    </ol>
                </div>


                <h4>Редагувати головну сторінку #<?php echo $id; ?></h4>

                <br/>

                <div class="col-lg-4">
                    <div class="login-form">
                        <form action="#" method="post" enctype="multipart/form-data">





                            <p>Заголовок</p>
                            <input type="text" name="name" placeholder="" value="<?php echo $home['name']; ?>">

                            <p>Стаття</p>
                            <textarea id="editor1"  cols="100" rows="20" type="text" name="content" placeholder="" value=""><?php echo $home['content']; ?></textarea>
                            <script type="text/javascript">
                                var ckeditor1 = CKEDITOR.replace( 'editor1' );
                                AjexFileManager.init({
                                    returnTo: 'ckeditor',
                                    editor: ckeditor1
                                });
                            </script>
                            <p>Головне зображення</p>
                            <img src="<?php echo Home::getImage1($home['id_game']); ?>" width="200" alt="" />
                            <input type="file" name="image1" placeholder="" value="<?php echo $home['image1']; ?>">

                            <p>Допоміжне зображення</p>
                            <img src="<?php echo Home::getImage2($home['id_game']); ?>" width="200" alt="" />
                            <input type="file" name="image2" placeholder="" value="<?php echo $home['image2']; ?>">

                            <br><br>





                            <input type="submit" name="submit" class="btn btn-default" value="Зберегти">

                            <br/><br/>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>