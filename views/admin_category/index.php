<?php include ROOT . '/views/layouts/header_admin.php'; ?>

    <section>
        <div class="container">
            <div class="row">

                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Адмінпанель</a></li>
                        <li class="active">Керування категоріями</li>
                    </ol>
                </div>

                <a href="/admin/category/create" class="btn btn-default back"><i class="fa fa-plus"></i> Додати категорію</a>

                <h4>Перелік категорій</h4>

                <br/>

                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID категорії</th>
                        <th>Назва категорії</th>




                        <th></th>
                        <th></th>
                    </tr>
                    <?php foreach ($categoryList as $category): ?>
                        <tr>
                            <td><?php echo $category['id']; ?></td>
                            <td><?php echo $category['name_category']; ?></td>



                            <td><a href="/admin/category/update/<?php echo $category['id']; ?>" title="Редагувати"><i class="fa fa-pencil-square-o"></i></a></td>
                            <td><a href="/admin/category/delete/<?php echo $category['id']; ?>" title="Видалити"><i class="fa fa-times"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>

            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>