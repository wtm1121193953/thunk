<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2019/3/11
 * Time: 21:37
 */
namespace app\index\controller;

use app\admin\controller\My_Controller;
use function PHPSTORM_META\elementType;
use  think\Request;
class Test extends My_Controller
{

    public function index(){

        return view('test/index');

    }


    public function get_list_all(){

        $arr = [
            'list_one'=>[
                ['key'=>1,'value'=>'iphone1'],
                ['key'=>2,'value'=>'iphone2'],
                ['key'=>3,'value'=>'iphone3'],
                ['key'=>4,'value'=>'iphone4'],
                ['key'=>5,'value'=>'iphone5'],
            ],
            'list_two'=>[
                ['key'=>1,'value'=>'huawei1'],
                ['key'=>2,'value'=>'huawei2'],
                ['key'=>3,'value'=>'huawei3'],
                ['key'=>4,'value'=>'huawei4'],
                ['key'=>5,'value'=>'huawei5'],
            ],
            'list_tree'=>[
                ['key'=>1,'value'=>'rx1'],
                ['key'=>2,'value'=>'rx2'],
                ['key'=>3,'value'=>'rx3'],
                ['key'=>4,'value'=>'rx4'],
                ['key'=>5,'value'=>'rx5'],
            ],
        ];

        echo  json_encode(array('code'=>0,'msg'=>'ok','list'=>$arr));
    }






}