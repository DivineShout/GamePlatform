<?php include ROOT . '/views/layouts/header_admin.php'; ?>

    <section>
        <div class="container">
            <div class="row">

                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Адмінпанель</a></li>
                        <li class="active">Керування користувачами</li>
                    </ol>
                </div>

                <a href="/admin/users/create" class="btn btn-default back"><i class="fa fa-plus"></i> Додати користувача</a>

                <h4>Перелік користувачів</h4>

                <br/>

                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID</th>
                        <th>Електронна адреса</th>
                        <th>Ім'я</th>
                        <th>Прізвище</th>
                        <th>Дата народження</th>
                        <th>Нік</th>
                        <th>Пароль</th>
                        <th>Права</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php foreach ($userList as $user): ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['surname']; ?></td>
                            <td><?php echo $user['data_birth']; ?></td>
                            <td><?php echo $user['nick']; ?></td>
                            <td><?php echo $user['password']; ?></td>
                            <td><?php echo $user['role']; ?></td>
                            <td><a href="/admin/users/update/<?php echo $user['id']; ?>" title="Редагувати"><i class="fa fa-pencil-square-o"></i></a></td>
                            <td><a href="/admin/users/delete/<?php echo $user['id']; ?>" title="Видалити"><i class="fa fa-times"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>

            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>