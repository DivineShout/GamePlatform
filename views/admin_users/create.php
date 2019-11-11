<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Адмінпанель</a></li>
                    <li><a href="/admin/users">Керування користувачами</a></li>
                    <li class="active">Додати користувача</li>
                </ol>
            </div>


            <h4>Додати нового користувача</h4>

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

                        <p>Електронна адреса</p>
                        <input type="text" name="email" placeholder="" value="">

                        <p>Ім'я</p>
                        <input type="text" name="name" placeholder="" value="">

                        <p>Прізвище</p>
                        <input type="text" name="surname" placeholder="" value="">

                        <p>Дата народження</p>
                        <input type="date" name="data_birth" placeholder="" value="">

                        <p>Нік</p>
                        <input type="text" name="nick" placeholder="" value="">

                        <p>Пароль</p>
                        <input type="text" name="password" placeholder="" value="">

                        <p>Зображення користувача</p>
                        <input type="file" name="image" placeholder="" value="">

                        <p>Права</p>
                        <input type="text" name="role" placeholder="" value="">

                        <br><br>

                        <input type="submit" name="submit" class="btn btn-default" value="Зберегти">
                    </form>
                </div>
            </div>


        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

