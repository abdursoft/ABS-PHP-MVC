<?php

/** Abs Framework
 *  Developed by abdursoft
 *  Author Abdur Rahim
 *  Version 1.0.1
 *  Born on 2023
 */


namespace App\Controller;

use Exception;
use System\Auth;

class User extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function user($param)
    {
        try {
            $user = Auth::jwtDecode($param['token']);
            echo $this->response([
                'status' => 1,
                'message' => 'server is ok',
                'data' => $user
            ], 200);
        } catch (Exception $e) {
            echo $this->response([
                'status' => 0,
                'message' => $e->getMessage(),
            ], 200);
        }
    }
    public function register()
    {
        $this->load->page_title = "User Register";
        $this->load->view('register');
    }
    public function login($param)
    {
        if (!empty($param)) {
            $token = Auth::jwtAUTH($param, 'users');
            echo $this->response([
                'status' => 1,
                'message' => 'Login successful',
                'token' => $token,
                'token_type' => 'Bearer'
            ], 200);
        }
    }
}
