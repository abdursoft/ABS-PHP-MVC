<?php
/** Abs Framework
 *  Developed by abdursoft
 *  Author Abdur Rahim
 *  Version 1.0.1
 *  Born on 2023
 */

 
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