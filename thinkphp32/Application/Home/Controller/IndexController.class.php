<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->thinkVersion = THINK_VERSION;
        $this->title = '仿用友ERP练习系统';
        $this->display('index');
    }
}