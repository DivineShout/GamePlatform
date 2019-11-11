<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Адмінпанель</a></li>
                    <li><a href="/admin/users">Керування іграми</a></li>
                    <li class="active">Додати гру</li>
                </ol>
            </div>


            <h4>Додати нову гру</h4>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-md-12">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Назва гри</p>
                        <input type="text" name="name_game" placeholder="" value="">



                        <p>Категорія гри</p>

                        <select name="id_category">
                            <?php if (is_array($categoryList)): ?>
                                <?php foreach ($categoryList as $category): ?>
                                    <option value="<?php echo $category['id']; ?>">
                                        <?php echo $category['name_category']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <p>Опис гри</p>
                        <textarea id="editor1"  cols="70" rows="10" type="text" name="description" placeholder="" value=""></textarea>



                        <p>Зображення гри</p>
                        <input type="file" name="image" placeholder="" value="">
                        <br>
                        <p>Перед тим як додати гру, додайти строку коду<br>
                            --parent.incomingValue(document.getElementById("ID вашого поля з результатом").value);--<br>
                            після кінцевого виводу результата, якщо його немає, то додайте поле input type="hidden"<br>
                            Також потрібно у PHP файлі зв'язати JS та CSS файли за допомогою таких строчок:<br>
                            --script src="/template/js/(ID доданої гри).js">/script--<br>
                            --link rel="stylesheet" href="/template/css/(ID доданої гри).css"--<br>
                        </p>
                        <p>PHP файл</p>
                        <input type="file" name="file_php" placeholder="" value="">
                        <br>
                        <p>CSS файл</p>
                        <input type="file" name="file_css" placeholder="" value="">
                        <br>
                        <p>JS файл</p>
                        <input type="file" name="file_js" placeholder="" value="">
                        <br><br>

                        <input type="submit" name="submit" class="btn btn-default" value="Зберегти">
                    </form>
                </div>
            </div>


        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>
