<?php
namespace app\index\controller;

use app\admin\controller\My_Controller;
use function PHPSTORM_META\elementType;
use  think\Request;

class Index extends My_Controller
{


    public function index()
    {

        return view();
    }


    public function getList(){

        $arr = array(
          [
              'id'=>'1',
              'name'=>'哈哈哈1',
              'mobile'=>'13148872522',
              'email'=>'1121193953@qq.com',
              'role'=>'管理员',
              'create_time'=>'2019-3-10 12:10:20',
          ],
           [
                'id'=>'1',
                'name'=>'哈哈哈2',
                'mobile'=>'13148872522',
                'email'=>'1121193953@qq.com',
                'role'=>'管理员',
                'create_time'=>'2019-3-10 12:10:20',

            ]
        );

        echo  json_encode(array('code'=>0,'msg'=>'ok','list'=>$arr));
    }



    public function add_index(){
        return view('add/index-add');

    }






    public function result_edit(){

       $arr =  [
            'id'=>'1',
            'name'=>'哈哈哈1',
           'img_1'=>'https://img.tps138.com/Erp/Commodity/201712/358416621/5a404fa2d25d4_main_w200_h200.jpg',
           'img_2'=>'https://img.tps138.com/Erp/Commodity/201801/532286047/5a5d77a1f326f_main_w250_h250.jpg',
             'mobile_one'=>[
                ['key'=>1,'value'=>'iphone1'],
                ['key'=>2,'value'=>'iphone2'],
                ['key'=>3,'value'=>'huawei3']
            ],
            'mobile_two'=>[
                ['key'=>4,'value'=>'iphone4'],
                ['key'=>5,'value'=>'iphone5'],
                ['key'=>6,'value'=>'huawei7'],
            ]
        ];

        echo  json_encode(array('code'=>0,'msg'=>'ok','list'=>$arr));
    }



    public function submit(){
        $postParam = Request::instance()->post();
        echo '<pre>';
        print_r($postParam);

        dump($_FILES);

    }



    function object_array($array) {
        if(is_object($array)) {
            $array = (array)$array;
        } if(is_array($array)) {
            foreach($array as $key=>$value) {
                $array[$key] = object_array($value);
            }
        }
        return $array;
    }





















    //冒泡排序
    public function rev_array ($array)
    {
        $N = count($array);
        for ($i=$N-1 ; $i > 0 ; $i-- )
        {
            for ($j=0 ; $j < $i ; $j++)
            {
                if ($array[$j] > $array[$j+1] )
                {
                    $temp = $array[$j];
                    $array[$j] = $array [$j+1];
                    $array[$j+1] = $temp;
                }
            }
        }
        return $array;
    }





    












































}
