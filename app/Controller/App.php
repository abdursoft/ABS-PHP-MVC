<?php
/** Abs Framework
 *  Developed by abdursoft
 *  Author Abdur Rahim
 *  Version 1.0.1
 *  Born on 2023
 */

 
namespace App\Controller;

class App extends Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $this->load->page_title = "Have a good journey with ABS framework";
        $this->load->view('welcome');
    }
    public function init(){
        echo "HELLO APP";
    }
}
?>