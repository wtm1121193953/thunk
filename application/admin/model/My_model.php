<?php

namespace app\admin\model;
use think\Model;

Class My_model extends  Model{

   public function __construct($data = [])
   {
       parent::__construct($data);
   }


     public function get_one($select="*",$where=[],$or_where=[]){

         $one =  $this->db()->field($select)->table($this->table)->where($where)->whereOr($or_where)->find();
         if($one){
             return $one->toArray();
         }else{
             return array();
         }
     }


     public function get_list($select="*",$where=[],$or_where=[],$page_size=100,$page=1,$order_by=[],$group_by=[]){

         $this->db()->field($select);
         $this->db()->table($this->table);
         $this->db()->where($where);
         $this->db()->whereOr($or_where);
         $this->db()->limit(($page-1)*$page_size,$page_size);
         if($order_by && is_array($order_by)){
             foreach ($order_by as $k=>$v){
                if($v){
                    if(in_array(strtolower($v),['desc','aes'])) {
                        $this->db()->order($k,$v);
                        continue;
                    }
                }
                $this->db()->order($k,$v);
             }
         }

         if($group_by) {
             if (is_array($group_by)) {
                 foreach ($group_by as $kk => $vv) {
                     if ($vv) {
                         $this->db()->group($vv);
                     }
                 }
             }else{
                 $this->db()->group($group_by);
             }
         }

        return $this->db()->select()->toArray();

     }

     public function update_one(){


     }

     public function update_all(){


     }

     public function insert_one($dataPost){

         return $this->db($this->table)->insertGetId($dataPost);

     }

     public function insert_all(){


     }
}