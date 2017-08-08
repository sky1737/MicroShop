<?php

/**
 * 修改密码
 *
 * @author: moxiaobai
 * @since : 2015/3/20 16:05
 */

class PasswordController extends BaseController {

    const AUTH_KEY = 'M@x^@!e@($';

    public function init(){
        $this->initAdmin(false);
        $this->_model = $this->loadModel('SystemAdmin', array(), 'Admin');
    }

    //修改密码
    public function indexAction() {
        $oldPassword     = $_POST['oldPassword'];
        $newPassword     = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];

        if(empty($oldPassword) || empty($newPassword) || empty($confirmPassword)) {
            Helper_Json::echoJson(-1, '必填项');
        }

        //判断原密码是否正确
        if($this->_model->getUserPassword(A_ID) != $this->_model->setMd5Password($oldPassword)) {
            Helper_Json::echoJson(-1, '原密码错误');
        }

        //更新密码
        $password = $this->_model->setMd5Password($newPassword);
        $ret = $this->_model->updatePassword(A_ID , array('a_password'=>$password));
        if($ret) {
            Helper_Json::echoJson(1, '密码更新成功');
        } else {
            Helper_Json::echoJson(-1, '密码更新错误');
        }
    }

    //修改密码 管理员
    public function changeAction() {
        $id     = intval($_POST['id']);
        $newPassword     = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];

        if(empty($newPassword) || empty($confirmPassword)) {
            Helper_Json::formJson('密码不能为空');
        }
        if($newPassword != $confirmPassword){
            Helper_Json::formJson('两次密码输入不正确');
        }

        //更新密码
        $password = $this->_model->setMd5Password($newPassword);
        $ret = $this->_model->updatePassword($id , array('a_password'=>$password));
        if($ret) {
            Helper_Json::formJson('密码更新成功');
        } else {
            Helper_Json::formJson('密码更新错误');
        }
    }
}