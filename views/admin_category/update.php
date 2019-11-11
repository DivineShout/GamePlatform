<?php include ROOT . '/views/layouts/header_admin.php'; ?>

    <section>
        <div class="container">
            <div class="row">

                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Адмінпанель</a></li>
                        <li><a href="/admin/category">Керування категоріями</a></li>
                        <li class="active">Редагувати категорію</li>
                    </ol>
                </div>


                <h4>Редагувати категорію #<?php echo $id; ?></h4>

                <br/>

                <div class="col-lg-12">
                    <div class="login-form" >
                        <form action="#" method="post" enctype="multipart/form-data">



                            <p>Назва</p>
                            <input type="text" name="name_category" placeholder="" value="<?php echo $categoryList['name_category']; ?>">




                            <br><br>
                            <br><br>





                            <input type="submit" name="submit" class="btn btn-default" value="Зберегти">

                            <br/><br/>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>