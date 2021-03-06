<?php
namespace Admin\Controller;
use Common\ORG\Util\Page;
class ChoujiangController extends BaseController {
    public $user;
    public $Model;
    public $com;
    public function _initialize(){
        parent::_initialize();
        $this->com = M('choujiang');
    }
    //主页删除
    public function gdelete_data(){
        $list = $_REQUEST['list'];
        if($list){
            $var=explode(",",$list);
            foreach ($var as $k=>$v){
                $res = $this->com->where(array('id'=>$v))->delete();
                if($res){
                    $this->success('操作成功',U(CONTROLLER_NAME.'/gindex'));
                }
                else{
                    $this->error('操作失败',U(CONTROLLER_NAME.'/gindex'));
                }
            }
        }else{
            $where['id'] = $_REQUEST['id'];
            $res = $this->com->where($where)->delete();
            if($res){
                $this->success('操作成功',U(CONTROLLER_NAME.'/gindex'));
            }
            else{
                $this->error('操作失败',U(CONTROLLER_NAME.'/gindex'));
            }
        }
        $this->ajaxReturn($json);
    }

    //主页修改
    public function gsave_data() {
        if($_POST){

            $data['fist'] = $_POST['fist'];
            $data['fistnums'] = $_POST['fistnums'];
            $data['second'] = $_POST['second'];
            $data['secondnums'] = $_POST['secondnums'];
            $data['third'] = $_POST['third'];
            $data['thirdnums'] = $_POST['thirdnums'];
            $data['four'] = $_POST['four'];
            $data['fournums'] = $_POST['fournums'];
            $data['five']=$_POST['five'];
            $data['fivenums'] = $_POST['fivenums'];
            $data['num'] = $_POST['num'];
            $data['title'] = $_POST['title'];
            $data['sign'] = $_POST['sign'];
            // $data['intro'] = trim($_REQUEST['intro']);
            $data['strdate'] =  strtotime($_POST['strdate']) ;
            $data['enddate'] =  strtotime($_POST['enddate']);
            $data['text'] = I("editor_notice");
            $where['id']=$_POST['id'];
            $res = $this->com
                ->where($where)
                ->data($data)
                ->save();
            if($res){
                echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
                echo "<script>alert('操作成功');window.location.href=\"".U(CONTROLLER_NAME . '/gindex')."\";</script>";
                exit;
            }else{
                echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
                echo "<script>alert('操作失败');window.location.href=\"".U(CONTROLLER_NAME . '/gindex')."\";</script>";
                exit;
            }
        }
        $where['id'] = $_REQUEST['id'];
        $res = $this->com->where($where)->find();
        //输出当前产品信息
        $this->assign('list',$res);
        $this->display('gadd');
    }

    //主页修改状态
    public function gshow_change(){
        $res = $this->com
            ->where(array('id' => $_REQUEST['id']))
            ->save(array('status'=>$_REQUEST['status']));
    }
    //主页内容首页__gindex__
    public function gindex(){
        $where = '';
        $title = I('title');
        if($title){
            $where['title'] = array("like","%".$title."%");
        }
        $count = $this->com->where($where)->count();
        if($count == 0){
            $this->assign('not_found','没有您搜索的结果！');
        }
        $page = new Page($count,10);
        $res =$this->com->order('id desc')->where($where)
            ->limit($page->firstRow.','.$page->listRows)
            ->select();
        $this->assign('page', $page->show());
        $this->assign('list',$res);
        $this->assign('title',$title);
        $this->assign('nav_head',C('COMPANY_1'));
        $this->display();
    }

    //主页内容首页__gindex__
    public function win(){
        $count = M('choujiang_win')->where(array('pid'=>$_GET['id']))->count();
        $page = new Page($count,10);
        $res =M('choujiang_win')->order('id desc')->where(array('pid'=>$_GET['id']))
            ->limit($page->firstRow.','.$page->listRows)
            ->select();
        $this->assign('page', $page->show());
        $this->assign('list',$res);
        $this->display();
    }


    public function test(){
        dump(C('COMPANY_1'));
    }
    //主页内容添加__gadd__
    public function gadd(){
        if($_POST){
          //  print_r($_POST); exit;
            $data['fist'] = $_POST['fist'];
            $data['fistnums'] = $_POST['fistnums'];
            $data['second'] = $_POST['second'];
            $data['secondnums'] = $_POST['secondnums'];
            $data['third'] = $_POST['third'];
            $data['thirdnums'] = $_POST['thirdnums'];
            $data['four'] = $_POST['four'];
            $data['fournums'] = $_POST['fournums'];
            $data['five']=$_POST['five'];
            $data['fivenums'] = $_POST['fivenums'];
            $data['num'] = $_POST['num'];
            $data['title'] = $_POST['title'];
            $data['sign'] = $_POST['sign'];
           // $data['intro'] = trim($_REQUEST['intro']);
            $data['strdate'] =  strtotime($_POST['strdate']) ;
            $data['enddate'] =  strtotime($_POST['enddate']);
           // print_r($_POST)

            $data['text'] = I("editor_notice");
            $data['date'] = time();
            $res = M("choujiang")->add($data);
            if($res > 0){
                echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
                echo "<script>alert('操作成功');window.location.href=\"".U(CONTROLLER_NAME .'/gindex')."\";</script>";
                exit;
            }
            else{
                echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
                echo "<script>alert('操作失败');window.location.href=\"".U(CONTROLLER_NAME . ACTION_NAME)."\";</script>";
                exit;
            }
        }
        $this->display();
    }

}