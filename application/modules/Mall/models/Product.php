<?php

/**
 * 商品模型
 *
 * @auther lindexin
 * @since  2016-4-11
 */

class ProductModel extends BaseModel {
    private $_field;

    public function __construct(){
        $this->_field = 'p_id,pc_id,p_title,p_cover,p_content,p_sales,p_collect,p_stock,p_price,p_sort,p_status,p_addTime,p_updateTime';
        parent::__construct('www', 't_product', 'p_id');
    }

    /**
     * 查询所有商品
     */
    public function getAllProduct($where=array(), $pagination=array()) {
        $data = $this->_setWhereSQL($where)
            ->_setPaginationSQL($pagination)
            ->_db
            ->select($this->_field)
            ->from($this->_table)
            ->order('p_sort','ASC')
            ->fetchAll();

        if(!$data){
            return $data;
        }

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
        if (isset($condition['title']) AND $condition['title']) {
            $this->_db->where("p_title LIKE '%{$condition['title']}%'");
        }

        if (isset($condition['pid']) AND $condition['pid']) {
            $this->_db->where("p_id", $condition['pid']);
        }

        if (isset($condition['type']) AND $condition['type']) {
            $this->_db->where("pc_id", $condition['type']);
        }

        if (isset($condition['status']) AND $condition['status']) {
            $this->_db->where("p_status", $condition['status']);
        }

        if (isset($condition['startTime']) AND $condition['startTime']) {
            $this->_db->where("p_addTime >= '" . $condition['startTime'] . "'");
        }

        if (isset($condition['endTime']) AND $condition['endTime']) {
            $this->_db->where("p_addTime <= '" . $condition['endTime'] . "'");
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

    /**
     * 删除商品
     */
    public function deleteProduct($id){
        return $this->_db->delete($this->_table)->from($this->_table)->where($this->_primary_key,$id)->execute();
    }

   /**
    * 查询所有分类对应ID
    */
    public function getAllCategory(){

        $data =  $this->_db->select('pc_name','pc_id')->from('t_product_category')->fetchAll();
        if(!$data){
            return $data;
        }

        $alldata = array();
        foreach($data as $v){
            $alldata[$v['pc_id']] = $v['pc_name'];
        }
        return $alldata;
    }

    /**
     * 按条件删除商品
     */
    public function deleteProductByCond($where = array()){
        return $this->_setWhereSQL( $where )->_db->delete($this->_table)->from($this->_table)->execute();
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

    /**
     * 通过id获得单个数据
     */
    public function getProductById($id, $field = ''){

        return $this->
              _db->select($field ? $field : $this->_field)
              ->from($this->_table)
              ->where('p_id',$id)
              ->fetchOne();
    }

    /**
     * 通过编号获取信息
     *
     * @param $id
     * @return mixed
     */
    public function getProductBySku($sku){
        return $this->
        _db->select($this->_field)
            ->from($this->_table)
            ->where('p_sku',$sku)
            ->where('p_status', 1)
            ->fetchOne();
    }

    /**
     * 保存商品信息（新增，更新操作）
     *
     * @param  $data
     * @param int $id
     * @return mixed
     */
    public function saveProduct($data, $id=0){
        if ( $id > 0 ) {
            $this->_db->update($this->_table)->rows($data)->where('p_id', $id);
        } else {
            $this->_db->insert($this->_table)->rows($data);
        }

        return $this->_db->execute();
    }

    /**
     * 通过id获得商品名称
     *
     * @param  $id
     * @return mixed
     */
    public function getProductName($id){
        return $this->_db->select('p_title')->from($this->_table)->where('p_id',$id)->fetchOne();
    }

    public function getPidBySku($sku = ''){
        return $this->_db->select('p_id')->from($this->_table)->where('p_sku', $sku)->fetchValue();
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
        $info = $this->_db->select($this->_field)->from($this->_table)->where("p_id IN({$ids})")->fetchAll();
        if ( $info === FALSE ) {return $data;}

        $info = Helper_Array::setIdsKey($info, 'p_id');
        foreach ( $data AS $k => &$row ) {
            if(isset($info[ $row[$key] ])){
                $row['p_id']      = $info[ $row[$key] ]['p_id'];
                $row['p_cover']      = $info[ $row[$key] ]['p_cover'];
                $row['p_price']  = $info[ $row[$key] ]['p_price'];
                $row['p_title']    = $info[ $row[$key] ]['p_title'];
            }else{
                unset($data[$k]);
            }
        }

        return $data;
    }

    // 增加销量
    public function addSales($id, $num){
        return $this->_db->update($this->_table)->where($this->_primary_key, $id)->set('p_sales', $num, true)->execute();
    }


    /**
     * 递增分享次数
     * @param $id 商品id
     * @return mixed
     */
    public function addShare($id){
        return $this->_db->update($this->_table)->where($this->_primary_key, $id)->set('p_share', 1, true)->execute();
    }

    /**
     * 递增收藏次数
     * @param $id 商品id
     * @return mixed
     */
    public function addCollect($id){
        return $this->_db->update($this->_table)->where($this->_primary_key, $id)->set('p_collect', 1, true)->execute();
    }

    /**
     * 通过商品id判断是否存在
     * @param $pid 商品id
     * @return $this
     */
    public function getByIdData($pid){
        return $this->_db->select('p_id','p_type')->from($this->_table)->where('p_id',$pid)->fetchOne();
    }

    /**
     * 增加库存
     * @param $id 商品id
     * @param $num 大于0表示扣库存
     * @return mixed
     */
    public function updateStock($id, $num){
        if($num > 0){
            return $this->_db->update($this->_table)->where($this->_primary_key, $id)->where('p_stock >= ' . $num)->set('p_stock', '-' . $num, true)->execute();
        }else{
            return $this->_db->update($this->_table)->where($this->_primary_key, $id)->set('p_stock', abs($num), true)->execute();
        }

    }

    /**
     * 修改销量
     *
     * @param $id
     * @param $num 大于0表示增加销量
     */
    public function updateSales($id, $num){
        if($num < 0){
            return $this->_db->update($this->_table)->where($this->_primary_key, $id)->where('p_sales >= ' . abs($num))->set('p_sales', $num, true)->execute();
        }else{
            return $this->_db->update($this->_table)->where($this->_primary_key, $id)->set('p_sales', $num, true)->execute();
        }
    }
}