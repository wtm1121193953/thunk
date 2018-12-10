<?php

namespace app\admin\controller;
use  Result\CodeResult;
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

        $menuList = Db('system_module')->where(array('visible'=>1,'level'=>1,'module'=>'menu'))->select();
        $this->assign('menuList',$menuList);
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

            if(empty($dataPOST['cate_name'])){
                $this->response(CodeResult::PARAMS_INVALID,'分类名不能为空');
            }

            $menuList = Db('system_module')->where(array('visible'=>1,'level'=>1,'module'=>'menu'))->select();
            if(in_array($dataPOST['cate_name'],array_column($menuList,'title'))){
                $this->response(CodeResult::DATA_EXIST,'分类名已存在');
            }
            $data  = [
                'module' => 'menu',
                'level'  =>  1,
                'title'  =>  $dataPOST['cate_name'],
            ];

            $insertId = Db('system_module')->insertGetId($data);
            if($insertId){
                $this->response(CodeResult::SUCCESS,'添加成功');
            }else{
                $this->response(CodeResult::DB_INSERT_FAIL,'添加失败');
            }
        }

    }








}