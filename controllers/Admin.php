<?php
namespace Full\Controllers;

use Full\Models\News;
use Full\Classes\View;

require_once __DIR__ . '/../autoload.php';

class Admin
{

    public function actionAdd() {

if ((!empty($_POST)) &&
(empty($_POST['title']) || empty($_POST['text'])))
{

echo 'Не все поля заполнены!';
}

elseif
(!empty($_POST['title']) && !empty($_POST['text'])) {

    $items = new News;

    $items->title = $_POST['title'];
    $items->text = $_POST['text'];

    $items->save();
    header('Location: /');
}
        $form = new View;
        $form->display('form.php');
}

    public function actionUpd() {

        $id = $_GET['id'];

            if (!empty($_POST)) {

                $items = News::findByID($id);
                $items->title = $_POST['title'];
                $items->text = $_POST['text'];
                $items->save();

                header('Location: /');
            }

        $form = new View;
        $form->data = News::findByID($id);

        $form->display('form.php');
        }

    public function actionDell() {

        $id = $_GET['id'];

        $items = News::findByID($id);
        $items->delete();
        header('Location: /');
    }

}




