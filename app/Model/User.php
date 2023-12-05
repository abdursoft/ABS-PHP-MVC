<?php
namespace App\Model;

use DB\DB;

class User extends DB{
    public function __construct()
    {
        parent::__construct();
    }

    public function allUser(){
        $user = $this->db->selectAll("SELECT * FROM users");
        return $user;
    }
}
?>