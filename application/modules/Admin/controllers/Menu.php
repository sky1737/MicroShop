<?php

/**
 * 菜单
 *
 * @author: moxiaobai
 * @since : 2016/1/20 15:07
 */

class MenuController extends BaseController
{

    private $_menuModel;

    public function init()
    {
        $this->initAdmin(false);
        $this->_menuModel = $this->loadModel('SystemMenu', array(), 'Admin');
    }

    /**
     * 首页
     */
    public function indexAction() {
        $mid    = isset($_GET['mid']) ? $_GET['mid'] : '';
        $name   = isset($_GET['nameSearch']) ? $_GET['nameSearch'] : '';
        $parent = isset($_GET['menuSearch']) ? $_GET['menuSearch'] : 0;

        $menuList = $this->_menuModel->getMenuList();
        $topList  = $this->_menuModel->getTopMenu();

        $where  = array('mid'=>$mid, 'm_name'=>$name, 'm_parent_id'=>$parent);
        $list   = $this->_menuModel->getMenu($where);

        $this->getView()->assign(array(
            'topList'   => $topList,
            'menuList'  => $menuList,
            'list'      => $list,
            'mid'       => $mid,
            'name'      => $name,
            'parent'    => $parent
        ));
    }

    //表单
    public function formAction($id=0) {
        $id  = intval($id);


        if ( $id > 0 ) {
            $row = $this->_menuModel->getMenuById($id);
            if ( ! $row['m_id'] ) {
                Helper_Json::formJson('参数错误');
            }

            if ( isset( $row['m_id'] ) ) {
                $this->getView()->assign('row', $row);
            }
        } else {
            $row = array('m_id'=>'', 'm_name'=>'','m_url'=>'','m_tag'=>'','m_order'=>'','m_parent_id'=>'','m_module_name'=>'','m_controller_name'=>'');
            $this->getView()->assign('row', $row);
        }

        $menuList = $this->_menuModel->getMenuList();
        $topList  = $this->_menuModel->getTopMenu();
        $this->getView()->assign("topList", $topList);
        $this->getView()->assign("menuList", $menuList);
    }


    /**
     * 添加修改记录
     */
    public function saveAction() {
        $id                     = $_POST['id'];
        $m_module_name          = $_POST['m_module_name'];
        $m_controller_name      = $_POST['m_controller_name'];
        $parent  = isset($_POST['menuEdit']) ? $_POST['menuEdit'] : 0;
        $name    = $_POST['name'];
        $tag     = $_POST['tag'];
        $url     = $_POST['url'];
        $order   = $_POST['order'];
        //$content = $_POST['content'];

        $data = array(
            'm_parent_id' => $parent,
            'm_name'      => $name,
            'm_url'       => $url,
            'm_tag'       => $tag,
            'm_order'     => $order,
            'm_memo'      => '',
            'm_addtime'   => date('Y-m-d H:i:s'),
            'm_module_name'       => $m_module_name,
            'm_controller_name'   => $m_controller_name
        );

        $urlInfo = $this->_menuModel->getMidByUrl($url);
        if ( $id > 0 ) {
            // 判断url是否存在
            if(!empty($urlInfo) && $urlInfo != $id){
                Helper_Json::formJson('菜单URL已存在');
            }

            $this->_menuModel->saveMenu($data, $id);
            Helper_Json::formJson('修改成功','y');
        } else {
            if(!empty($urlInfo)){
                Helper_Json::formJson('菜单URL已存在');
            }

            $this->_menuModel->saveMenu($data);
            Helper_Json::formJson('添加成功','y');
        }
    }

    /**
     * 删除记录
     */
    public function deleteAction($id=0) {
        if ( ! $id )
            Helper_Json::formJson('参数错误');

        if ( $this->_menuModel->deleteMenu( $id ) ) {
            Helper_Json::formJson('删除成功', 'y');
        }

        Helper_Json::formJson('删除失败');
    }


    /**
     * 更新菜单缓存
     */
    public function refreshAction() {
        $this->_menuModel->refreshMenu();
        Helper_Json::formJson('更新成功', 'y');
    }

    //菜单信息
    public function infoAction() {
        $id = intval($_REQUEST['id']);
        if (empty($id) ) {
            Helper_Json::echoJson(-1, '');
        }

        if ( A_ROLE == 1 ) {
            $menuList = $this->_menuModel->getMenuList($id);
        } else {
            $menuList = $this->_menuModel->getRightMenuList($id);
        }

        Helper_Json::echoJson(1, $menuList);
    }

    //保存快捷菜单
    public function saveQuickMemuAction() {
        $id = intval($_GET['id']);

        if( $this->_menuModel->issetQuickMemu($id) ) {
            Helper_Json::echoJson(-1,'已设置');
        }

        $result = $this->_menuModel->setQuickMemu($id);
        if($result) {
            Helper_Json::echoJson(1,'快捷菜单设置成功');
        } {
            Helper_Json::echoJson(-1,'快捷菜单设置失败');
        }
    }

    //移除快捷菜单
    public function removeQuickMemuAction() {
        $id = intval($_GET['id']);

        $result = $this->_menuModel->removeQuickMemu($id);
        if($result) {
            Helper_Json::echoJson(1,'删除快捷菜单成功');
        } else {
            Helper_Json::echoJson(-1,'删除快捷菜单失败');
        }
    }
}