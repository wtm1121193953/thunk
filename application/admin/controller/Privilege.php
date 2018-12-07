<?php

namespace app\admin\controller;
use  think\Request;

Class  Privilege  extends  My_Controller{

    public function __construct(Request $request = null)
    {
        parent::__construct($request);
    }


    public function index(){
          return $this->fetch('admin_list');
    }
    

    public function admin_role(){
        return $this->fetch('admin_role');
    }


    /**
     * 权限分类
     * @return mixed
     */
    public function admin_cate(){
        
        return $this->fetch('admin_cate');
    }



    public function admin_rule(){
        return $this->fetch('admin_rule');
    }


    /**
     * 添加权限分类
     */
    public function add_cate(){

        if (request()->isAjax()) {

            $dataPOST = Request::instance()->only(['cate_name'],'post');
            if(empty($cate_name)){
                return false;
            }
          
            $data  = [
                'module' => 'menu',
                'level'  =>  1,
                'title'  =>  $dataPOST['cate_name'],
            ];

           // Db::name('system_module')->insert($data);
            Db('system_module')->insert($data);

        }

    }








}