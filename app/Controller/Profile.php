<?php
/** Abs Framework
 *  Developed by abdursoft
 *  Author Abdur Rahim
 *  Version 1.0.1
 *  Born on 2023
 */

 namespace App\Controller;

use System\Auth;
use System\Session;

 class Profile extends Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function profile(){
        $this->load->page_title = "Profile page";
        var_dump(Session::get('jwt_token'));
        echo "Welcome To Your Profile";
    }

    public function forgot(){
        echo "Password Forgot";
    }

    public function retrieve(){
        echo "Password Retrieve";
    }
 }