<?php

namespace app\admin\controller;
use  think\Controller;
use  think\Request;


Class My_Controller extends  Controller{


     public function __construct(Request $request = null)
     {
         parent::__construct($request);

     }




    public function response($code = null,$message = '',$data = array()){

         if(!is_numeric($code)){
             return '';
         }

        $result = array(
            'code' =>$code,
            'message' => $message,
            'data' => $data
        );

        echo json_encode($result);
        exit;
    }



}