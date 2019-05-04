<?php

namespace app\index\controller;

use app\admin\controller\My_Controller;
use function PHPSTORM_META\elementType;
use  think\Request;

class Demo extends My_Controller
{

    public function index()
    {

        return view();
    }

    public function test()
    {

        return $this->fetch('test');
    }


    public function dataJson()
    {
        $data = [
            [
                'id' => '1',
                'parent_id' => 0,
                'name' => 'iphone',
                'children' => [
                    [
                        'id' => '3',
                        'parent_id' => 1,
                        'name' => 'iphone-1',
                        'children'=>[
                            [
                                'id' => '5',
                                'parent_id' => 3,
                                'name' => 'iphone-1-1',
                            ],
                            [
                                'id' => '6',
                                'parent_id' => 3,
                                'name' => 'iphone-1-1',
                            ]
                        ]
                    ],
                    [
                        'id' => '4',
                        'parent_id' => 1,
                        'name' => 'iphone-2',
                        'children'=>[
                            [
                                'id' => '7',
                                'parent_id' => 4,
                                'name' => 'iphone-2-1',
                            ],
                            [
                                'id' => '8',
                                'parent_id' => 4,
                                'name' => 'iphone-2-1',
                            ]
                        ]
                    ],
                ]
            ],
            [
                'id' => '2',
                'parent_id' => 0,
                'name' => 'huawei',
                'children' => [
                    [
                        'id' => '9',
                        'parent_id' => 2,
                        'name' => 'huawei-1',
                        'children'=>[
                            [
                                'id' => '10',
                                'parent_id' => 9,
                                'name' => 'huawei-1-1',
                            ],
                            [
                                'id' => '11',
                                'parent_id' => 9,
                                'name' => 'huawei-1-1',
                            ]
                        ]
                    ],
                    [
                        'id' => '12',
                        'parent_id' => 2,
                        'name' => 'huawei-2',
                        'children'=>[
                            [
                                'id' => '13',
                                'parent_id' => 12,
                                'name' => 'huawei-2-1',
                            ],
                            [
                                'id' => '14',
                                'parent_id' => 12,
                                'name' => 'huawei-2-1',
                            ]
                        ]
                    ],
                ]
            ],
        ];

        echo  json_encode(['errorCode'=>0,'errorMsg'=>'ok','data'=>$data]);

    }


}