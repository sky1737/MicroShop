<?php


/**
 * 旅游分类
 *
 * @author: monyyip
 * @since : 20160407
 */

class CategoryController extends BaseController {

    private $_pageSize;
    private $_model;
    private $status;

    public function init()
    {
        $this->initAdmin(false);
        $this->_model = $this->loadModel('Category', array(), 'Mall');
        $this->_pageSize = 12;
        $this->status = array(
            1 => '正常',
            2 => '禁用'
        );
    }

    //首页
    public function indexAction($page=1) {
        $name     = isset($_GET['name']) ? Helper_Filter::format(trim($_GET['name'])) : '';
        $pid     = isset($_GET['pid']) ? intval($_GET['pid']) : 0;
        //$source = isset($_GET['source']) ? intval($_GET['source']) : 0;
        $page     = intval($page);


        //模型和控制器
        $baseUrl = '/' . $this->getRequest()->getModuleName() . '/' . $this->getRequest()->getControllerName() . '/';

        //分页参数，读取参数设置
        $where      = array('name'=>$name, 'pid' => $pid, 'source' => 2);
        $pagination = array('page'=>$page, 'pagesize'=>$this->_pageSize);

        //做分页
        $total    = $this->_model->countData($where);
        $pageUrl  = $baseUrl .  'index/';
        $pageCode = $this->setPage($page, $this->_pageSize, $total, strtolower($pageUrl));

        //数据列表
        $data = $this->_model->getList( $where, $pagination );
        // 获得分类树
        $tree = $this->_model->getCategoryTree(FALSE, 0, '', 2);
        $categoryOption = $this->_model->getCategoryTreeOptions($tree, $pid);
        //$sourceOption = Helper_Form::option($this->_source, $source, '请选择平台');
        //模版赋值
        $this->getView()->assign(array(
            'baseUrl'      => $baseUrl,
            'name'         => $name,
            'data'      => $data,
            'total'     => $total,
            'page'      => $pageCode,
            'categoryOption' => $categoryOption,
        ));
    }

    //表单页
    public function formAction($id=0) {
        $id = intval($id);
        if ( $id > 0 ) {
            $row     = $this->_model->getInfo($id);
        }else{
            $row = array('pc_id' => '','pc_pid' => '','pc_alise' => '','pc_name' => '','pc_order' => '1','pc_status' => '1');
        }


        // 获得分类树
        $tree = $this->_model->getCategoryTree(FALSE, 0, '', 2);
        $categoryOption = $this->_model->getCategoryTreeOptions($tree, intval($row['pc_pid']));
        $statusOption = Helper_Form::option($this->status, intval($row['pc_status']), '请选择状态');
        //$sourceOption = Helper_Form::option($this->_source, intval($row['pc_source']), '请选择平台');
        $this->getView()->assign('categoryOption', $categoryOption);
        $this->getView()->assign('statusOption', $statusOption);
        $this->getView()->assign('row', $row);
    }

    //新增保存数据
    public function saveAction() {
        $id  = intval( $_POST['id'] );

        // 基本数据过滤
        $data  = $this->getRequest()->getPost();
        $pid = intval($data['pc_pid']);
        $info = $this->_model->getInfo($pid);
        if($info['pc_pid'] != 0){
            Helper_Json::formJson('只可添加二级分类', 'n');
        }
        $where = array('alise'=>$data['pc_alise'],'selfId'=>$id);
        $retName = $this->_model->isExistData($where);
        if($retName){
            Helper_Json::formJson('别名已存在，请换一个', 'n');
        }

        $file = Helper_Filter::format( $this->getRequest()->getPost('file'), TRUE );
        if($file) {
            $data['pc_img'] = $file;
        }

        unset($data['id']);
        unset($data['file']);
        if($id > 0) {
            $this->_model->saveData($data, $id);
            Helper_Json::formJson('修改成功', 'y');
        } else {
            $this->_model->saveData($data);
            Helper_Json::formJson('添加成功', 'y');
        }
    }

//上传主图图片
    public function uploadAction() {
        $api = new Qiniu_Api('img');
        $params = array('category'=>'mall', 'file'=>$_FILES['upload']);
        $ret = $api->uploadImg($params);
        if($ret['code'] == 1) {
            Helper_Json::formJson($ret['data'], 'y');
        } else {
            Helper_Json::formJson($ret['msg'], 'n');
        }
    }

    //更改状态
    public function statusAction($id, $status) {
        $id = intval($id);
        if( empty($id) ) {
            Helper_Json::formJson('缺失参数');
        }

        $status = ($status == 1) ? 2: 1;
        $data = array('pc_status'=>$status);
        $result   = $this->_model->changeData($id,$data);
        if($result) {
            Helper_Json::formJson('操作成功', 'y');
        } else {
            Helper_Json::formJson('操作失败');
        }
    }


    //删除分类
    public function deleteAction($id){
        $id = intval($id);
        if(empty($id)){
            Helper_Json::echoJson(-1,'缺少参数ID');
        }

        // 判断该分类或者子分类是否还有商品，否则不让删除
        $cateList = array();
        $tree = $this->_model->getCategoryTree();
        if(isset($tree[$id]['d_childs']) && !empty($tree[$id]['d_childs'])){
            $cateList = array_keys($tree[$id]['d_childs']);
        }else{
            $cateList[] = $id;
        }

        // 获得该分类下面的商品
        $productList = $this->loadModel('Product')->getAllProduct(array('cidList' => $cateList));
        if(!empty($productList)){
            Helper_Json::formJson('请先删除该分类下面的商品');
        }

        //获得商品列表名称
        $row = $this->_model->getInfo($id);
        $result = $this->_model->deleteCategory(array('pc_id' => $id));
        if($result){
            // 删除对应子分类
            $this->_model->deleteCategory(array('pid' => $id));
            Helper_Json::formJson('删除成功', 'y');
        } else {
            Helper_Json::formJson('删除失败');
        }
    }

    public function getCategoryAction(){
        $tree = $this->_model->getCategoryTree(FALSE, 0, '', 2);
        $categoryOption = $this->_model->getCategoryTreeOptions($tree, 0);
        if($categoryOption){
            Helper_Json::formJson($categoryOption, 'y');
        }else{
            Helper_Json::formJson('无数据');
        }
    }
}