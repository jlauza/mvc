<?php
class Home extends Controller {

    protected $user;

    public function __construct() {
        $this->user = $this->model('User');
    }
    public function index() {
        // This line callback the method from extends Controller or parent controller w/c is the view
        $this->view('home/index');
    }

    // public function create($fname="", $lname="", $email="", $password=""){
    //     User::create([
    //         'fname' => $fname,
    //         'lname' => $lname,
    //         'email' => $email,
    //         'password' => password_hash($password, DEFAULT_PASSWORD)
    //     ]);
    // }
}
