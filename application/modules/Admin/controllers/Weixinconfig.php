<?php

/**
 * 微信公众号配置
 *
 * @author: monyyip
 * @since : 2016/08/15
 */

class WeixinconfigController extends BaseController {

    private $_model;

    private $_type = array(
        '1' => '微信公众号配置',
    );

    public function init() {
        $this->initAdmin(false);
        $this->_model = $this->loadModel('WeixinConfig',array(),'Admin');
    }


    public function indexAction() {
        $this->initPageTitle('微信配置列表');

        //模型和控制器
        $baseUrl    = '/' . $this->getRequest()->getModuleName() . '/' . $this->getRequest()->getControllerName() . '/';

        //数据
        $data           = $this->_model->getInfo();

        //模版赋值
        $this->getView()->assign(array(
            'typeList'       => $this->_type,
            'data'           => $data,
            'baseUrl'           => $baseUrl,
        ));
    }
    /**
     * 上传
     */
    public function uploadAction() {

        $upload = new Images_Upload( $_FILES['upload'] );

        // Allow img file uploaded.
        $upload->setNoTypeCode();
        $upload->setMaxSize(0);
        $path   = 'cert/';
        $return = $upload->upload($path, 'apiclient_cert.pem');
        if ( $return['status'] <= 0 ) {
            Helper_Json::formJson($return);
        }

        Helper_Json::formJson($return, 'y');
    }

    /**
     * 上传
     */
    public function upload2Action() {
        $upload = new Images_Upload( $_FILES['upload2'] );
        // Allow img file uploaded.
        $upload->setNoTypeCode();
        $upload->setMaxSize(0);

        $path   = 'cert/';
        $return = $upload->upload($path, 'apiclient_key.pem');
        if ( $return['status'] <= 0 ) {
            Helper_Json::formJson($return);
        }

        Helper_Json::formJson($return, 'y');
    }

    public function saveAction(){
        $post = $this->getRequest()->getPost();

        $id = intval($post['id']);
        unset($post['file']);
        unset($post['file2']);
        unset($post['id']);
        if($id){
            $msg = '修改';

            $ret = $this->_model->saveData($post, $id);
        }else{
            $msg = '添加';
            $post['wc_addtime'] = date('Y-m-d H:i:s');
            $ret = $this->_model->saveData($post);
        }
        if($ret){
            Helper_Json::formJson($msg . '成功', 'y');
        }else{
            Helper_Json::formJson($msg . '失败');
        }

    }

}