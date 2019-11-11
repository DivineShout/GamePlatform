<?php include ROOT . '/views/layouts/header_admin.php'; ?>

    <section>
        <div class="container">
            <div class="row">

                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Адмінпанель</a></li>
                        <li class="active">Перегляд повідомлень</li>
                    </ol>
                </div>

                <a href="/admin/home/update" class="btn btn-default back"><i class="fa fa-pencil-square-o"></i> Оновити сторінку</a>

                <h4>Вміст сторінки</h4>

                <br/>

                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID </th>
                        <th>Email</th>
                        <th>Повідомлення</th>

                    </tr>
                    <?php foreach ($feedbackList as $feedback): ?>
                        <tr>
                            <td><?php echo $feedback['id']; ?></td>

                            <td><?php echo $feedback['email']; ?></td>
                            <td><?php echo $feedback['message']; ?></td>

                        </tr>
                    <?php endforeach; ?>
                </table>

            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>