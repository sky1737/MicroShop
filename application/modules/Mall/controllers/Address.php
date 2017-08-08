<?php

/**
 * 收货地址
 *
 * @author: monyyip
 * @since : 2016/10/12 16:43
 */

class AddressController extends BaseController {
    public function init() {
        $this->initViewPath();
        $this->initShopCart();
    }

    public function indexAction($pay = 0) {
        $address = $this->loadModel('Address', array(), 'Mall')->getList(array('mid' => M_ID));
        $newUrl = '';
        if($pay == 1){

            if($pay && isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER']){
                $refferUrl = $_SERVER['HTTP_REFERER'];

                $tmparr = parse_url($refferUrl);
                parse_str($tmparr['query'], $params);
                if(isset($params['addr'])){
                    unset($params['addr']);
                }

                $query = http_build_query($params);
                $newUrl = $tmparr['scheme'] . '://' . $tmparr['host'] . $tmparr['path'] . '?' . $query;
            }

        }

        $this->getView()->assign('baseUrl', $newUrl ? base64_encode($newUrl) : '');
        $this->getView()->assign('url', $newUrl);
        $this->getView()->assign('data', $address);
    }

    public function editAction($id = 0){
        $url = isset($_GET['url']) ? base64_decode($_GET['url']) : '';
        if($id){
            $address = $this->loadModel('Address', array(), 'Mall')->getInfo($id);
        }else{
            $address = array(
                'a_id' => '',
                'a_phone' => '',
                'a_realname' => '',
                'a_province' => '',
                'a_city' => '',
                'a_area' => '',
                'a_default' => '',
                'a_address' => '',
            );
        }

        $this->getView()->assign('url', $url);
        $this->getView()->assign('data', $address);
    }
}