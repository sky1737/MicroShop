<?php

/**
 * 用户管理
 *
 * @author: lindexin
 * @since : 2016/1/29 10:36
 */

class MemberModel extends BaseModel {

    private $_filed;
    public function __construct()
    {
        parent::__construct('www', 't_member', 'm_id');
        $this->_filed = 'm_id,m_openId,m_phone,m_password,m_status,m_regIp,m_addtime';
    }

    /**
     * 获取列表
     *
     * @param array $where
     * @param array $pagination
     * @return bool
     */
    public function getList($where=array(), $pagination=array()) {
        $data = $this->_setWhereSQL($where)
                    ->_setPaginationSQL($pagination)
                    ->_db->select($this->_filed)
                    ->from($this->_table)
                    ->order($this->_primary_key, 'DESC')
                    ->fetchAll();

        if ( $data === FALSE ) return FALSE;
        return $data;
    }

    /**
     * 生成帐号
     * @param array $data  网页授权获取的用户数据
     */
    public function login($data) {
        $openId    = isset($data['openid']) ? $data['openid'] : null;
        $nickname  = isset($data['nickname']) ? $data['nickname'] : null;
        $avatar    = isset($data['headimgurl']) ? $data['headimgurl'] : null;

        //如果获取不到用户信息
        if(is_null($openId)) {
            return false;
        }

        $userInfo = $this->addMember($openId, $nickname, $avatar);
        //用户数据写入session
        $userInfo = array(
            'mid'      => $userInfo['m_id'],
            'nickname' => $nickname,
            'openId'   => $openId,
            'avatar'   => $avatar
        );

        Yaf_Session::getInstance()->set('userFrontInfo', $userInfo);

        return true;
    }

    /**
     * 添加用户
     *
     * @param $openId    OpenId
     * @param $nickname  昵称
     * @param $avatar    用户头像
     * @return mixed
     */
    public function addMember($openId, $nickname="", $avatar="") {
        $userInfo = $this->getUserInfoByOpenId($openId);
        if(!$userInfo) {
            //写入用户表数据
            $ip   = Helper_Location::getIpString();
            $rows = array(
                'm_openId'   => $openId,
                'm_nickname' => $nickname,
                'm_avatar'   => $avatar,
                'm_regIp'    => $ip,
                'm_addtime'  => date('Y-m-d H:i:s')
            );

            $mid = $this->_db->insert('t_member')->rows($rows)->execute();
            $userInfo = array('m_id'=>$mid);
        }

        return $userInfo;
    }

    /**
     * 通过OpenID获得用户信息
     *
     * @param $openId
     * @return mixed
     */
    public function getUserInfoByOpenId($openId) {
        return $this->_db->select('m_id')->from('t_member')->where('m_openId', $openId)->fetchOne();
    }

    /**
     * 统计数量
     *
     * @param array $where
     */
    public function countData($where=array()) {
        return $this->_setWhereSQL($where)->_db->select('COUNT(*)')->from($this->_table)->fetchValue();
    }

    /**
     * 改变状态
     *
     * @param $id
     * @param array $data 修改数据
     * @return mixed
     */
    public function changeData($id, $data) {
        return $this->_db->update($this->_table)->rows($data)->where($this->_primary_key, $id)->execute();
    }

    /**根据用户id获得openID
     * @param $id
     */
    public function getOpenId($id) {
        return $this->_db->select('m_openId')->from($this->_table)->where($this->_primary_key, $id)->fetchValue();
    }

    /**
     * SQL分页查询
     */
    private function _setPaginationSQL( $pagination = array() ) {
        if ( isset($pagination['page']) AND isset($pagination['pagesize']) ) {
            $page      = isset( $pagination['page'] ) ? intval($pagination['page']) : 1;
            $pagesize  = isset( $pagination['pagesize']  ) ? intval($pagination['pagesize'])  : 10;
            $this->_db->page($page, $pagesize);
        } elseif ( isset($pagination['limit']) ) {
            $this->_db->limit( intval($pagination['limit']) );
        }
        return $this;
    }

    /**
     * SQL Where条件
     * @param array $where
     * @return $this
     */
    private function _setWhereSQL ($where = array()) {

        if (isset($where['status']) AND $where['status']) {
            $this->_db->where('m_status',$where['status']);
        }


        if (isset($where['phone']) AND $where['phone']) {
            $this->_db->where('m_phone',$where['phone']);
        }

        return $this;
    }

    /**
     * 整合信息
     *
     * @param $data
     * @return mixed
     */
    public function mergData($data,$key='m_id') {
        if ( ! is_array( $data ) )
            return $data;

        $ids = Helper_Array::setIds($data, $key, TRUE);
        if ( ! $ids) {return $data;}

        //订单信息
        $info = $this->_db->select('m_id,m_nickname,m_realname')->from($this->_table)->where("m_id IN({$ids})")->fetchAll();
        if ( $info === FALSE ) {return $data;}

        $info = Helper_Array::setIdsKey($info, 'm_id');

        foreach ( $data AS &$row ) {
            $row['m_nickname']   = isset($info[ $row[$key] ]) ? $info[ $row[$key] ]['m_nickname'] : '';
            $row['m_realname']   = isset($info[ $row[$key] ]) ? $info[ $row[$key] ]['m_realname'] : '';
            $row['m_id']   = isset($info[ $row[$key] ]) ? $info[ $row[$key] ]['m_id'] : '';
        }
        return $data;
    }

    /**
     * 通过OpenId获得用户信息
     */
    public function getInfoByOpenId($openId){
        return $this->_db->select('m_id,m_avatar,m_nickname,m_phone')->from($this->_table)->where('m_openId',$openId)->fetchOne();
    }


}

