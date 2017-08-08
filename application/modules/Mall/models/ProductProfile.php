<?php

/**
 * 商品模型
 *
 * @auther lindexin
 * @since  2016-4-11
 */

class ProductProfileModel extends BaseModel {

    private $_field;

    public function __construct(){
        $this->_field = 'pp_id,p_id,pt_id,pp_name,pp_price,pp_stock,pp_sales,pp_editTime,pp_addTime';
        parent::__construct('www', 't_product_profile', 'pp_id');
    }

    /**
     * 查询所有商品
     */
    public function getList($where=array(), $pagination=array()) {
        $data = $this->_setWhereSQL($where)
            ->_setPaginationSQL($pagination)
            ->_db
            ->select($this->_field)
            ->from($this->_table)
            ->order($this->_primary_key,'ASC')
            ->fetchAll();

        return $data;
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
     * @param array $condition
     * @return $this
     */
    private function _setWhereSQL ($condition = array()) {
        if (isset($condition['p_id']) AND $condition['p_id']) {
            $this->_db->where("p_id", $condition['p_id']);
        }

        return $this;
    }

    /**
     * 统计数量
     * @param $condition
     * @return mixed
     */
    public function countProduct($condition) {
        return $this->_setWhereSQL( $condition )->_db->select('COUNT(*)')->from($this->_table)->fetchValue();
    }

    public function clearDefault($pid){
        return $this->_db->update($this->_table)->where('p_id', $pid)->set('pp_default', 2)->execute();
    }

    public function changeStatus($pid, $status){
        return $this->_db->update($this->_table)->where('p_id', $pid)->set('pp_status', $status)->execute();
    }

    /**
     * 改变状态
     *
     * @param $id
     * @param array $data 修改数据
     * @return mixed
     */
    public function changeData($id, $data) {
        return $this->_db->update($this->_table)->rows($data)->where($this->_primary_key,$id)->execute();
    }

    public function getInfo($id){
        return $this->_db->select($this->_field)->from($this->_table)->where($this->_primary_key,$id)->fetchOne();
    }

    public function delData($id){
        return $this->_db->delete($this->_table)->from($this->_table)->where($this->_primary_key,$id)->execute();
    }


    public function changeStock($id, $num){
        if($num > 0){
            return $this->_db->update($this->_table)->where($this->_primary_key, $id)->where('pp_stock >= ' . $num)->set('pp_stock', '-' . $num, true)->execute();
        }else{
            return $this->_db->update($this->_table)->where($this->_primary_key, $id)->set('pp_stock', abs($num), true)->execute();
        }
    }

    /**
     * 保存商品信息（新增，更新操作）
     *
     * @param  $data
     * @param int $id
     * @return mixed
     */
    public function saveData($data, $id = 0){
        if ( $id > 0 ) {
            $this->_db->update($this->_table)->rows($data)->where($this->_primary_key, $id);
        } else {
            $this->_db->insert($this->_table)->rows($data);
        }

        return $this->_db->execute();
    }

    public function clearList($p_id, $ppIdList){
        return $this->_db->delete($this->_table)->from($this->_table)->where("p_id", $p_id)->where('pp_id not in(' . implode(',', $ppIdList) . ')')->execute();
    }

    /**
     * @param $ppids
     * @param $num 大于0表示扣库存
     * @return mixed
     */
    public function updateStock($ppids, $num){
        if($num > 0){
            return $this->_db->update($this->_table)->set('pp_stock', '-' . $num, true)->where('pp_id in(' . $ppids . ')')->where('pp_stock >= ' . $num)->execute();
        }else{
            return $this->_db->update($this->_table)->set('pp_stock', abs($num), true)->where('pp_id in(' . $ppids . ')')->execute();
        }

    }

    /**
     * 修改销量
     *
     * @param $id
     * @param $num 大于0表示增加销量
     */
    public function updateSales($ppids, $num){
        if($num < 0){
            return $this->_db->update($this->_table)->set('pp_sales', $num, true)->where('pp_id in(' . $ppids . ')')->where('pp_sales >= ' . abs($num))->execute();
        }else{
            return $this->_db->update($this->_table)->set('pp_sales', $num, true)->where('pp_id in(' . $ppids . ')')->execute();
        }
    }

    /**
     * 整合信息
     *
     * @param $data
     * @return mixed
     */
    public function mergData($data = array(), $key = 'p_id'){
        if ( ! is_array( $data ) )
            return $data;

        $ids = Helper_Array::setIds($data, $key, TRUE);
        if ( ! $ids) {return $data;}

        // 产品信息
        $info = $this->_db->select('p_id,pp_name')->from($this->_table)->where("p_id IN({$ids})")->fetchAll();
        if ( $info === FALSE ) {return $data;}

        $info = Helper_Array::setIdsKey($info, 'p_id');
        foreach ( $data AS $k => &$row ) {
            if(isset($info[ $row[$key] ])){
                $row['p_id']      = $info[ $row[$key] ]['p_id'];
                $row['pp_name']      = $info[ $row[$key] ]['pp_name'];
            }else{
                unset($data[$k]);
            }
        }

        return $data;
    }
}