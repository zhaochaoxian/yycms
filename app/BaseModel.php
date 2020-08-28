<?php
declare (strict_types = 1);
	
namespace app;
use think\Model;
/**
 * 模型
 */
class BaseModel extends Model{
	
//	public function __construct(array $data = []){
//  	parent::__construct($data);
//  }
	
	public function getStatusTextAttr($value,$data){
		$info_model = m('model')->where(['name'=>parse_name($this->name)])->find();
		$extra=m('attribute')->where(['model_id'=>$info_model['id'],'name'=>'status'])->value('extra');
		$field=preg_split("/[\r\n]+/s", $extra,-1,PREG_SPLIT_NO_EMPTY);
		$status=[];
		foreach($field as $k=>$v){
			$v=preg_split("/[:]+/s", $v,-1,PREG_SPLIT_NO_EMPTY);
			$status[$v[0]]=$v[1];
		}
        return $status[$data['status']];
    }
}
