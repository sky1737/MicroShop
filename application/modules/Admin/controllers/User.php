<?php

/**
 * 用户管理
 *
 * @author monyyip
 * @since  2016-9-27
 */

class UserController extends BaseController {

    private $pagesize = 20;
    public function init()
    {
        $this->initAdmin(false);
        $this->M_user = $this->loadModel('SystemAdmin');
        $this->_pageSize = 12;
        $this->status = array(
            1 => '正常',
            2 => '禁用'
        );

        $this->role = array(
            1 => '超级管理员',
            2 => '普通管理员',
        );
    }

    //列表页
    public function indexAction($page=1) {
        $status     = isset($_GET['status']) ? $_GET['status'] : '';
        $realname   = isset($_GET['realname']) ? $_GET['realname'] : '';
        $page       = intval($page);
        $status_options = Helper_Form::option($this->status, intval($status));

        //数据列表
        $where      = array('status' => $status, 'username' => $realname);
        $pagination = array('page'=> $page, 'pagesize'=> $this->pagesize);
        $data     = $this->M_user->getList($where, $pagination);
        $total    = $this->M_user->countData($where);
        $page_url = APP_DOMAIN . 'admin/user/index/';

        $pagecode = $this->setPage($page, $this->pagesize, $total, $page_url);

        $this->getView()->assign(array(
            "realname"       => $realname,
            'status_options' => $status_options,
            'page'           => $pagecode,
            'data'           => $data,
            'total'          => $total,
        ));
    }
    
    //Ajaxfrom
    public function formAction($id=0) {
        $id  = intval($id);
        if ( $id > 0 ) {
            $row = $this->M_user->getInfo($id);
            if ( ! $row['a_id'] )
                Helper_Json::formJson('参数错误');
        }     

        if ( isset( $row['a_id'] ) ) {
            $status_options     = Helper_Form::option($this->status, intval($row['a_status']));
            $this->getView()->assign('row', $row);
        } else {
            $status_options     = Helper_Form::option($this->status);
            $row = array('a_id'=>'','a_username'=>'','a_realname' => '','a_password'=>'','a_phone'=>'', 'a_role'=>'', 'a_status' => '','a_openId' => '');
            $this->getView()->assign('row', $row);
        }

        $this->getView()->assign(array(
            'status_options'     => $status_options,
        ));
    }

    //Ajaxfrom
    public function editpasswordAction($id=0) {
        $id  = intval($id);
        if ( $id > 0 ) {
            $row = $this->M_user->getInfo($id);
            if ( ! $row['a_id'] )
                Helper_Json::formJson('参数错误');
        }

        $this->getView()->assign(array(
                'id' =>$id
        ));
    }


    //修改保存
    public function saveAction() {
        $id         = $_POST['id'];
        $username   = $_POST['username'];
        $realname   = $_POST['realname'];
        $password   = isset($_POST['password']) ? Helper_Filter::format($_POST['password']) : '';
        $phone      = $_POST['phone'];
        $role       = 2;
        $status     = $_POST['status'];
        $openId     = $_POST['a_openId'];
    	$data = array(
           'a_username'    => $username,
           'a_realname'    => $realname,
           'a_phone'       => $phone,
           'a_role'        => $role,
           'a_password'    => $password,
           'a_status'      => $status,
           'a_openId'      => $openId,
    	);

        //数据验证
        if(Helper_Check::isMobile($phone) == false){
            Helper_Json::formJson('手机号码错误', 'n');
        }

    	if($id) {
            unset($data['a_password']);
            $result = $this->M_user->saveData($data, $id);
            if($result['code'] == 1) {
                Helper_Json::formJson('修改成功', 'y');
            } else {
                Helper_Json::formJson($result['data']);
            }
    	} else {
    		$result = $this->M_user->saveData($data);
            if($result['code'] == 1) {
                Helper_Json::formJson('添加成功', 'y');
            } else {
                Helper_Json::formJson($result['data']);
            }
    	}
    }
    


    //重置密码
    public function passwordAction($id) {
        $id = intval($id);
        if( empty($id) ) {
            Helper_Json::echoJson(-1, '缺少参数ID');
        }

        $password = isset($_POST['password']) ? Helper_Filter::format($_POST['password']) : '123456';

        $result   = $this->M_user->editPassword($id, $password);
        if($result) {
            Helper_Json::formJson('修改密码成功', 'y');
        } else {
            Helper_Json::formJson('修改密码失败');
        }
    }

    //解除用户禁用状态
    public function statusAction($id, $status) {
        $id = intval($id);
        if( empty($id) ) {
            Helper_Json::echoJson(-1, '缺少参数ID');
        }

        $result   = $this->M_user->changeData($id, array('a_status' => $status == 1 ? 2 : 1));
        if($result) {
            Helper_Json::formJson('改价成功', 'y');
        } else {
            Helper_Json::formJson('修改失败');
        }
    }

    //删掉用户
    public function deleteAction($id) {
    	$id = intval($id);
        if( empty($id) ) {
            Helper_Json::echoJson(-1, '缺少参数ID');
        }

        $result   = $this->M_user->deleteData($id);
    	if($result) {
    		Helper_Json::formJson('删除成功', 'y');
    	} else {
    		Helper_Json::formJson('删除失败');
    	}
    }
}

