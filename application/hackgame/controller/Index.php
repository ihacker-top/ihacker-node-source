<?php
namespace app\hackgame\controller;

class Index {

    public function index () {

        header('Location: ' . url('hackgame/start/first'));
        exit;
    }
}
