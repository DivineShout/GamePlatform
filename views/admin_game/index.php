<?php include ROOT . '/views/layouts/header_admin.php'; ?>

    <section>
        <div class="container">
            <div class="row">

                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Адмінпанель</a></li>
                        <li class="active">Керування іграми</li>
                    </ol>
                </div>

                <a href="/admin/game/create" class="btn btn-default back"><i class="fa fa-plus"></i> Додати гру</a>

                <h4>Перелік ігор</h4>

                <br/>

                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID гри</th>
                        <th>Назва</th>

                        <th>Категорія</th>
                        <th>Опис гри</th>


                        <th></th>
                        <th></th>
                    </tr>
                    <?php foreach ($gameList as $game): ?>
                        <tr>
                            <td><?php echo $game['id_game']; ?></td>
                            <td><?php echo $game['name_game']; ?></td>

                            <td> <?php foreach ($categoryList as $category): ?>

                                        <?php if ($game['id_category'] == $category['id']) echo $category['name_category'];?>


                                <?php endforeach; ?></td>
                            <td><?php echo $game['description']; ?></td>

                            <td><a href="/admin/game/update/<?php echo $game['id_game']; ?>" title="Редагувати"><i class="fa fa-pencil-square-o"></i></a></td>
                            <td><a href="/admin/game/delete/<?php echo $game['id_game']; ?>" title="Видалити"><i class="fa fa-times"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>

            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>