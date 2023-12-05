<?php
namespace App\Controller;

class App extends Controller{
    public function index(){
        $this->load->view('welcome');
    }
    public function init(){
        echo "HELLO APP";
    }
}
?>