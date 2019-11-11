<?php include ROOT . '/views/layouts/header_admin.php'; ?>

    <section>
        <div class="container">
            <div class="row">

                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Адмінпанель</a></li>
                        <li><a href="/admin/users">Керування користувачами</a></li>
                        <li class="active">Редагувати користувача</li>
                    </ol>
                </div>


                <h4>Редагувати користувача #<?php echo $id; ?></h4>

                <br/>

                <div class="col-lg-4">
                    <div class="login-form">
                        <form action="#" method="post" enctype="multipart/form-data">

                            <p>Електронна пошта</p>
                            <input type="text" name="email" placeholder="" value="<?php echo $user['email']; ?>">

                            <p>Ім'я</p>
                            <input type="text" name="name" placeholder="" value="<?php echo $user['name']; ?>">

                            <p>Прізвище </p>
                            <input type="text" name="surname" placeholder="" value="<?php echo $user['surname']; ?>">

                            <p>Дата народження</p>
                            <input type="text" name="data_birth" placeholder="" value="<?php echo $user['data_birth']; ?>">

                            <p>Нік</p>
                            <input type="text" name="nick" placeholder="" value="<?php echo $user['nick']; ?>">

                            <p>Пароль</p>
                            <input type="text" name="password" placeholder="" value="<?php echo $user['password']; ?>">

                            <p>Зображення користувача</p>
                            <img src="<?php echo User::getImage($user['id']); ?>" width="200" alt="" />
                            <input type="file" name="image" placeholder="" value="<?php echo $user['image']; ?>">

                            <p>Права</p>
                            <input type="text" name="role" placeholder="" value="<?php echo $user['role']; ?>">
                            <br><br>





                            <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                            <br/><br/>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>