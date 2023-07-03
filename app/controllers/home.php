<?php
class Home extends Controller {
    public function index($name = "") {
        $user = $this->model('User');
        $user->name = $name;

        // This line callback the method from extends Controller or parent controller w/c is the view
        $this->view('home/index', ['name' => $user->name]);
    }
} 