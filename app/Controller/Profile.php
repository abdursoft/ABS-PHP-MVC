<?php
/** Abs Framework
 *  Developed by abdursoft
 *  Author Abdur Rahim
 *  Version 1.0.1
 *  Born on 2023
 */

 namespace App\Controller;

use System\Auth;

 class Profile extends Controller{
    public function __construct()
    {
        parent::__construct();
        Auth::getHeader();
    }

    public function profile(){
        $this->load->page_title = "Profile page";
        echo "Welcome To Your Profile";
    }
 }