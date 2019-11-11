<?php include ROOT . '/views/layouts/header_admin.php'; ?>

    <section>
        <div class="container">
            <div class="row">

                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Адмінпанель</a></li>
                        <li class="active">Керування головною сторінкою</li>
                    </ol>
                </div>

                <a href="/admin/home/update" class="btn btn-default back"><i class="fa fa-pencil-square-o"></i> Оновити головнуу сторінку</a>

                <h4>Вміст головної сторінки</h4>

                <br/>

                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID </th>
                        <th>Заголовок</th>
                        <th>Текс</th>

                        <th></th>

                    </tr>
                    <?php foreach ($homeList as $home): ?>
                        <tr>
                            <td><?php echo $home['id']; ?></td>

                            <td><?php echo $home['name']; ?></td>
                            <td><?php echo $home['content']; ?></td>

                            <td><a href="/admin/home/update/<?php echo $home['id']; ?>" title="Редагувати"><i class="fa fa-pencil-square-o"></i></a></td>

                        </tr>
                    <?php endforeach; ?>
                </table>

            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>