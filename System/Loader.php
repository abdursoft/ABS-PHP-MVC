<?php
namespace System;


class Loader
{
    public $page_title,$public,$flash,$meta,$script,$style,$resource,$root,$menu_active,$fav_icon,$active_admin=true;
    public function __construct()
    {
        $page = $_SERVER['PHP_SELF'];
        $newDomain = basename($page);
        $domain = str_replace($newDomain, "", $page);
        $this->public = $domain;
        $this->resource = 'public/resource/';
        $this->root = BASE_URL.$this->resource;
        $this->menu_active = 'active';
        $this->fav_icon = BASE_URL."assets/images/logo.png";
    }

    // view loader function 
    public function view($view,$data=NULL){
        if($data == TRUE){
            $data['page_title'] = $this->page_title;
            $data['flash'] = $this->flash;
            $data['meta'] = $this->meta;
            $data['favicon'] = $this->fav_icon;
            $data['script'] = $this->script;
            $data['style'] = $this->style;
            $data['menu_active'] = $this->menu_active;
            $data['load'] = $this;
            extract($data);
        }else{
            $data['page_title'] = $this->page_title;
            $data['flash'] = $this->flash;
            $data['meta'] = $this->meta;
            $data['favicon'] = $this->fav_icon;
            $data['script'] = $this->script;
            $data['style'] = $this->style;
            $data['menu_active'] = $this->menu_active;
            $data['load'] = $this;
            extract($data);
        }
        
        if(Auth::get('login') == true){
            include 'inc/auth/header.php';
        }elseif(Auth::get('admin') == true && $this->active_admin == true){
            include 'inc/admin/header.php';
        }elseif(Auth::get('publisher') == true){
            include 'inc/publisher/header.php';
        }else{
            include 'inc/header.php';
        }
        
        if(file_exists('public/view/'.$view.'.view.php')){
            include 'public/view/'.$view.".view.php";
        }else{
            if(file_exists('public/view/'.$view.".php")){
                include 'public/view/'.$view.".php";
            }else{
                return "View Not Found";
            }
        }
        
        if(Auth::get('login') == true){
            include 'inc/auth/footer.php';
        }elseif(Auth::get('admin') == true && $this->active_admin == true){
            include 'inc/admin/footer.php';
        }elseif(Auth::get('publisher') == true){
            include 'inc/publisher/footer.php';
        }else{
            include 'inc/footer.php';
        }
    }

        // view loader function 
        public function singleView($view,$data=NULL){
            if($data == TRUE){
                $data['page_title'] = $this->page_title;
                $data['flash'] = $this->flash;
                $data['meta'] = $this->meta;
                $data['favicon'] = $this->fav_icon;
                $data['script'] = $this->script;
                $data['style'] = $this->style;
                $data['menu_active'] = $this->menu_active;
                $data['load'] = $this;
                extract($data);
            }else{
                $data['page_title'] = $this->page_title;
                $data['flash'] = $this->flash;
                $data['meta'] = $this->meta;
                $data['favicon'] = $this->fav_icon;
                $data['script'] = $this->script;
                $data['style'] = $this->style;
                $data['menu_active'] = $this->menu_active;
                $data['load'] = $this;
                extract($data);
            }

            
            if(file_exists('public/view/'.$view.'.view.php')){
                include 'public/view/'.$view.".view.php";
            }else{
                if(file_exists('public/view/'.$view.".php")){
                    include 'public/view/'.$view.".php";
                }else{
                    return "View Not Found";
                }
            }
        }

    public function notFound(){
        include 'public/view/notfound/index.php';
    }
}

?>