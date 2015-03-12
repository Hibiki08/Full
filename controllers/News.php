<?php
namespace Full\Controllers;

use Full\Classes\View;
use Full\Classes\E404Exception;
use Full\Models\News as NewsModel;

class News
{

    public function actionAll()
    {
        $view = new View;
        $view->display('search.php');

        $view->data = NewsModel::findAll();;

        $view->display('all.php');
    }

    public function actionOne()
    {

        $id = $_GET['id'];

        $view = new View();
        $res = $view->data = NewsModel::findByID($id);
        if (empty($res)) {
            header("HTTP/1.0 404 Not Found");
            throw new E404Exception('Новость не найдена!');
            die;
        }
        $view->display('one.php');
    }

    public function actionFind()
    {

        if (!empty($_POST) && isset($_POST['searchTitle'])) {

            $items = new NewsModel;
            $column = 'title';
            $value = $_POST['searchTitle'];

            $res = $items->findByColumn($column, $value);

            if ($res == true) {

                $view = new View();
                $view->data = $res;
                $view->display('all.php');
            } else {
                    header("HTTP/1.0 404 Not Found");
                    throw new E404Exception('Новость не найдена!');
                    die;
            }
        }

        if (!empty($_POST) && isset($_POST['searchText'])) {

            $items = new NewsModel;
            $column = 'text';
            $value = $_POST['searchText'];

            $res = $items->findByColumn($column, $value);

            if ($res == true) {

                $view = new View();
                $view->data = $res;
                $view->display('all.php');
            } else {
                echo 'Новость не найдена!';
            }
        }

    }
}