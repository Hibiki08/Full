<?php
namespace Full\Classes;

class View {

    public $error;
    public $data = [];

    public function display($path) {

        foreach ($this->data as $key => $val) {

           foreach ($val as $v) {
               $value[] = $v;
           }
        }
        include __DIR__ . '/../views/' . $path;

    }

} 