<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Адмінпанель</a></li>
                    <li><a href="/admin/category">Керування категоріями</a></li>
                    <li class="active">Додати категорію</li>
                </ol>
            </div>


            <h4>Додати нову категорію</h4>

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
                    <form action="#" method="post" >

                        <p>Назва категорії</p>
                        <input type="text" name="name_category" placeholder="" value="">


                        <br>

                        <input type="submit" name="submit" class="btn btn-default" value="Зберегти">
                    </form>
                </div>
            </div>


        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>
