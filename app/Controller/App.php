<?php
/** Abs Framework
 *  Developed by abdursoft
 *  Author Abdur Rahim
 *  Version 1.0.1
 *  Born on 2023
 */

 
namespace App\Controller;

use App\Model\User\Users;

class App extends Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $user = Users::create([
            "name" => "Abdur Rahim",
            "id" => 1,
            "email" => "abrahimbadsha4@gmail.com"
        ]);
        var_dump($user);
        $this->load->page_title = "Have a good journey with ABS framework";
        $this->load->view('welcome');
    }

    public function test($param){
        echo "<p>Get Value</p>";
        print_r($param);
    }

    public function init(){
        $user = Users::all('username',[
            'limit' => 5,
            'sort'  => ['name' => -1]
        ]);

        echo "<pre>";
        foreach($user as $item){
            print_r($item);
        }
    }
}
?>