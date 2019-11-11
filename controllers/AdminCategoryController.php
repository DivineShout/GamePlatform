<?php
class AdminCategoryController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();
        $categoryList = Category::getCategoryList();

        require_once(ROOT . '/views/admin_category/index.php');
        return true;
    }

    public function actionCreate()
    {
        $categoryList = Category::getCategoryList();
        self::checkAdmin();
        if (isset($_POST['submit'])) {

            $category = $_POST['name_category'];

            $errors = false;

            if (!isset($category) || empty($category)) {
                $errors[] = 'заповніть поле';
            }

            if ($errors == false) {
                Category::createCategory($category);

                header("Location: /admin/category");
            }
        }
        require_once(ROOT . '/views/admin_category/create.php');
        return true;
    }

    public function actionUpdate($id)
    {
        $categoryList = Category::getCategoryListById($id);
        self::checkAdmin();

        if (isset($_POST['submit'])) {

            $category = $_POST['name_category'];

            Category::updateCategoryById($id, $category) ;
            header("Location: /admin/category");
        }
        require_once(ROOT . '/views/admin_category/update.php');
        return true;
    }

    public function actionDelete($id)
    {
        self::checkAdmin();
        if (isset($_POST['submit'])) {
            Category::deleteCategoryById($id);
            header("Location: /admin/category");
        }
        require_once(ROOT . '/views/admin_category/delete.php');
        return true;
    }
}