<?php include ROOT . '/views/layouts/header_admin.php'; ?>

    <section>
        <div class="container">
            <div class="row">

                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Адмінпанель</a></li>
                        <li class="active">Керування результатами</li>
                    </ol>
                </div>

                <a href="/admin/result/create" class="btn btn-default back"><i class="fa fa-plus"></i> Додати результат</a>

                <h4>Перелік результатів</h4>

                <br/>

                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID</th>
                        <th>Результат</th>
                        <th>Користувач</th>
                        <th>Гра</th>

                        <th></th>
                        <th></th>
                    </tr>
                    <?php foreach ($resultList as $result): ?>
                        <tr>
                            <td><?php echo $result['id']; ?></td>
                            <td><?php echo $result['score']; ?></td>
                            <td><?php echo $result['id_user']; ?></td>
                            <td><?php echo $result['id_game']; ?></td>

                            <td><a href="/admin/result/update/<?php echo $result['id']; ?>" title="Редагувати"><i class="fa fa-pencil-square-o"></i></a></td>
                            <td><a href="/admin/result/delete/<?php echo $result['id']; ?>" title="Видалити"><i class="fa fa-times"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>

            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>