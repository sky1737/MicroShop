<?php

/**
 * 后台管理首页
 *
 * @author: moxiaobai
 * @since : 2016/1/28 16:43
 */

class IndexController extends BaseController {

    public function init(){
        $this->initAdmin(false);
    }

    public function indexAction() {
        $this->initPageTitle('管理员主页');

        //登录日志
        $loginLogList = $this->loadModel('SystemAdmin')->getLogList(A_ID);
        //顶级菜单
        if ( ! defined('A_ROLE') )  {
            $this->redirect('/login');
            exit();
        }

        //菜单
        if ( A_ROLE == 2 ) {
            $topMenu = $this->loadModel('SystemMenu')->getTopMenu();
        } else {
            $topMenu = $this->loadModel('SystemMenu')->getRightTopMenu();
        }

        $this->getView()->assign(array(
            'loginLogList' => $loginLogList,
            'topMenu'      => $topMenu,
            'orderNumber'  => 0,
            'salesMoney'   => 0,
        ));
    }

    //修改密码表单页
    public function passwordAction() {}

    //修改密码
    public function editPasswordAction() {
        $this->isAjaxRequest();

        $params   = $this->getRequest()->getPost();

        $oldPassword     = $params['oldPassword'];
        $newPassword     = $params['newPassword'];
        $confirmPassword = $params['confirmPassword'];

        if(empty($oldPassword) || empty($newPassword) || empty($confirmPassword)) {
            Helper_Json::formJson('内容填写不完整');
        }

        $result = $this->loadModel('SystemAdmin')->updateUserPassword($oldPassword, $newPassword);
        if($result['code'] == 1) {
            Yaf_Session::getInstance()->del('login');
        }

        $this->eachJson($result);
    }
}