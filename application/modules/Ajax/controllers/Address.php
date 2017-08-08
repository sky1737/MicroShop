<?php

/**
 * 地址管理
 *
 * @author: monyyip
 * @since : 2016/10/12
 */

class AddressController extends BaseController
{

    //初始化
    public function init()
    {
        $this->isAjaxRequest();
        $this->isFrontLogin();
        Yaf_Dispatcher::getInstance()->disableView();
    }

    public function addAction(){
        $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
        $realname = isset($_POST['realname']) ? Helper_Filter::format($_POST['realname'], FALSE, TRUE) : '';
        $phone  = isset($_POST['phone']) ? Helper_Filter::format($_POST['phone'], FALSE, TRUE) : '';
        $city  = isset($_POST['city']) ? Helper_Filter::format($_POST['city'], FALSE, TRUE) : '';
        $address  = isset($_POST['address']) ? Helper_Filter::format($_POST['address'], FALSE, TRUE) : '';
        $a_default = isset($_POST['a_default']) ? $_POST['a_default'] : 0;
        if(empty($realname)){
            Helper_Json::formJson('请填写联系姓名');
        }

        if(empty($phone) || !Helper_Check::isMobile($phone)){
            Helper_Json::formJson('请填写联系电话');
        }

        if(empty($city)){
            Helper_Json::formJson('请选择省市');
        }

        $citys = explode(' ', $city);
        if(empty($address)){
            Helper_Json::formJson('请填写地址');
        }

        $data = array(
            'm_id' => M_ID,
            'a_phone' => $phone,
            'a_realname' => $realname,
            'a_province' => isset($citys[0]) ? $citys[0] : '',
            'a_city' =>  isset($citys[1]) ? $citys[1] : '',
            'a_area' =>  isset($citys[2]) ? $citys[2] : '',
            'a_default' => $a_default == 'true' ? 2 : 1,
            'a_address' => $address
        );

        if($id){
            $ret = $this->loadModel('Address', array(), 'Mall')->saveData($data, $id);
        }else{
            $data['a_addtime'] = date('Y-m-d H:i:s');
            $id = $ret = $this->loadModel('Address', array(), 'Mall')->saveData($data);
        }

        if($ret){
            $data = array(
                'info' => '操作成功',
                'id'   => $id,
            );

            Helper_Json::formJson($data, 'y');
        }else{
            Helper_Json::formJson('操作失败');
        }
    }

    public function deleteAction(){
        $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
        $info = $this->loadModel('Address', array(), 'Mall')->getInfo($id);
        if($info['m_id'] != M_ID){
            Helper_Json::formJson('非法操作');
        }

        $ret = $this->loadModel('Address', array(), 'Mall')->deleteData($id);
        if($ret){
            Helper_Json::formJson('操作成功', 'y');
        }else{
            Helper_Json::formJson('操作失败');
        }
    }
}