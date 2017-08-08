<?php

/**
 * 收藏模型
 *
 * @author: lindexin
 * @since : 2016/04/27
 */

class ProductCollectModel extends BaseModel{

    public function __construct(){
        $this->_field = 'pco_id,p_id,m_id,addTime,openID';
        parent::__construct('www', 't_product_collect', 'pco_id');
    }

    /**
     * 获取数据列表
     *
     * @param array $where       搜索条件
     * @param array $pagination  分页信息
     * @return mixed
     */
    public function getList($where=array(), $pagination = array(),$filed='') {
        $data = $this->_setWhereSQL($where)
            ->_setPaginationSQL($pagination)
            ->_db->select(isset($filed) ? $this->_field : $filed)
            ->from($this->_table)
            ->order('pco_id', 'DESC')
            ->fetchAll();

        if ( !$data) {
            return $data;
        }

        return $data;
    }



    /**
     * SQL分页查询
     */
    protected  function _setPaginationSQL( $pagination = array() ) {

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
     *
     * @param array $where
     * @return $this
     */
    private function _setWhereSQL ($where = array()) {
        if(isset($where['mid']) && $where['mid']){
            $this->_db->where('m_id', $where['mid']);
        }

        return $this;
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
     * 通过商品id查询收藏记录
     * @param array $id
     * @return mixed
     */
    public function getInfo($id){
        return $this->_db->select('p_id')->from('t_product_collect')->where('p_id',$id)->where('m_id',M_ID)->fetchOne();
    }

    /**
     * 通过id修改收藏状态
     *
     * @param array $id
     * @return mixed
     */
    public function changeStatus($id){

        $ret = $this->_db->select('p_id')->from('t_product_collect')->where('p_id',$id)->where('m_id',M_ID)->fetchOne();

        if($ret){
            //如果存在就删除
            $this->_db->delete('t_product_collect')->from('t_product_collect')->where('p_id',$id)->execute();
            return $this->result(2, '取消收藏成功');
        }else{
            //如果不存在就插入
            $data = array(
                'p_id'    => $id,
                'm_id'    => M_ID,
                'openID'  => OPEN_ID,
                'addTime' => date('Y-m-d H:i:s',time())
            );

            $this->_db->insert('t_product_collect')->rows( $data )->execute();
            return $this->result(1, '收藏成功');
        }
    }


}


