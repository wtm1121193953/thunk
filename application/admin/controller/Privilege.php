<?php

namespace app\admin\controller;
use  app\admin\model\SystemModule;
use  ResultCode;
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

        $model = new SystemModule();
        $menuList = $model->get_list('*',array('visible'=>1,'level'=>1,'module'=>'menu'),array('mod_id'=>2));
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

            $dataPost = Request::instance()->only('cate_name','post');
            if(empty($dataPost['cate_name'])){
                $this->response(ResultCode::PARAMS_INVALID,'分类名不能为空');
            }

            $model = new SystemModule();
            $menuList = $model->get_list('',array('visible'=>1,'level'=>1,'module'=>'menu'));
            if(in_array($dataPost['cate_name'],array_column($menuList,'title'))){
                $this->response(ResultCode::DATA_EXIST,'分类名已存在');
            }
            $data  = [
                'module' => 'menu',
                'level'  =>  1,
                'title'  =>  $dataPost['cate_name'],
            ];
            $insertId = $model->insert_one($data);
            if($insertId){
                $this->response(ResultCode::SUCCESS,'添加成功');
            }else{
                $this->response(ResultCode::DB_INSERT_FAIL,'添加失败');
            }
        }

    }




}