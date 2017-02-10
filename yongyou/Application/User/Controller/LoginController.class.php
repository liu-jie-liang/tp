<?php
namespace User\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
        $this->thinkVersion = THINK_VERSION;
        $this->title = '仿用友ERP练习系统';

        $langModel = M('lang', null);
        $this->langs = $langModel->select();

        $this->display('index');
    }
}