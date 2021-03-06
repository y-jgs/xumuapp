<?php
/**
 * Created by PhpStorm.
 * User: Allen
 * Date: 2016/2/2
 * Time: 15:05
 */

namespace Common\Model;

/**
 * 引用文件
 */
use Think\Model;

class LiveclassModel extends Model
{
    public function _initialize()
    {
        $this->model = M('liveclass');
    }
    protected $_validate=array(
        //	array('acc_id','require','用户名必须填写!'),
        ///	array('mobile','require','手机号必须填写!'),
        //	array('acc_id','','用户名已经存在！',0,'unique',1),
        ///	array('mobile','/((\d{11})|^((\d{7,8})|(\d{4}|\d{3})-(\d{7,8})|(\d{4}|\d{3})-(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1})|(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1}))$)/','请填写正确的电话号码！',0,'regex',1),
    );

    //查询列表
    public function GetList($conditon = "",$order="id asc",$field = "*",$size="10"){
        $result = $this->model->where($conditon)->field($field)->order($order)->limit($size)->page($page)->select();
        return $result;
    }
    //单个查找
    public function GetOne($conditon = "",$field = "*"){
        $result = $this->model->where($conditon)->field($field)->find();
        return $result;
    }


    //添加
    public function AddData($data){
        $result = $this->model->data($data)->add();
        if($result){
            return 1;
        }else{
            return 2;
        }
    }
    //修改
    public function SaveData($where,$data){
        $result = $this->model->where($where)->data($data)->save();
        if($result){
            return 1;
        }else{
            return 2;
        }
    }

    //删除
    public function DelData($where){
        $result = $this->model->where($where)->delete();
        return $result;
    }
}

?>