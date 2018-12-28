<?php

namespace app\admin\model;
use  app\admin\model\My_model;


Class SystemModule extends My_model{

    protected $table = 'system_module';


    public function __construct($data = [])
    {
        parent::__construct($data);
    }


}