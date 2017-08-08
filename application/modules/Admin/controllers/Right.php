<?php

/**
 * 权限分配
 *
 * @author lindexin
 * @since  2015-08-12
 */

class RightController extends BaseController {

    private $M_menu;
    private $M_admin;
    private $M_right;

    public function init() {
        $this->initAdmin(false);

        $this->M_menu = $this->loadModel('SystemMenu',array(),'Admin');
        $this->M_admin = $this->loadModel('SystemAdmin',array(),'Admin');
        $this->M_right = $this->loadModel('SystemRight',array(),'Admin');
    }


	public function indexAction() {
        $this->initPageTitle('权限管理');

		$uid         = isset($_GET['uid']) ? intval($_GET['uid']) : 0;
		$topMenuList = $this->M_menu->getTopMenu();
		$userOptions = Helper_Form::option( $this->M_right->getRightUserMap(), $uid, '请选择员工');
		if ( $uid > 0 ) {
			$menuList = $this->M_menu->getMenuList();
            $menuList = $menuList[1]['son'];
			$right = $this->M_right->getRight($uid);
			$right = $right === FALSE ? array() : explode(',', $right);

		} else {
            $right= array();
            $topMenuList= array();
            $menuList= array();
        }

		$this->getView()->assign(array(
            "userOptions"=> $userOptions,
            "right"=> $right,
            "topMenuList"=> $topMenuList,
            "menuList"=> $menuList,
        ));
	}
	
	public function saveAction() {
		$uid     = intval($_POST['uid']);
		$right   = $_POST['right'];

		$this->M_right->saveRight($uid, $right);
		Helper_Json::formJson('权限分发成功', 'y');
	}
}