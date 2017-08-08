<?php

/**
 * 商品列表
 *
 * @author: lindexin
 * @since : 2016/4/11
 */
class ProductController extends BaseController {

    //单页数量
    private $pagesize = 12;
    private $categoryType = '';
    private $profileType = '';
    private $_status = array(1=>'正常', 2=>'禁用');

    private $_menuList = array(
        'basic'           => '基本信息',
        'profile'   => '套餐价格配置',
    );

    public function init()
    {
        $this->initAdmin(false);
        $this->_model        = $this->loadModel('Product', array(), 'Mall');
        $this->categoryType  = $this->loadModel('Category', array(), 'Mall')->getAllCategory(0);
        $this->profileType   = $this->loadModel('ProfileType', array(), 'Mall')->getAllCategory(1);
        $this->_pageSize = 12;
        $this->status = array(
            1 => '正常',
            2 => '禁用'
        );
    }

    //获得商品列表
    public function indexAction($page=1){
        $title   = trim(isset($_GET['title']))  ? trim($_GET['title']) : '';
        $status    = isset($_GET['status'])   ? intval($_GET['status']) : 1;
        $type = isset($_GET['type']) ? intval($_GET['type']) : 0;
        $startTime  = isset($_GET['startTime']) ? $_GET['startTime'] : '';
        $endTime    = isset($_GET['endTime']) ? $_GET['endTime'] : '';
        $page       = intval($page);

        $tree = $this->loadModel('Category', array(), 'Mall')->getCategoryTree(FALSE, 0, '');
        $categoryOption = $this->loadModel('Category', array(), 'Mall')->getCategoryTreeOptions($tree, $type);

        // 状态列表
        $statusOption = Helper_Form::select('status', $this->_status, intval($status), '请选择状态');
        //分页
        $where      = array('title' => $title, 'type' => $type, 'status' => $status, 'startTime' => $startTime, 'endTime' => $endTime);
        $pagination = array('page'=> $page, 'pagesize'=> $this->pagesize);
        //模型和控制器
        $baseUrl    = '/admin/' . $this->getRequest()->getControllerName() . '/';
        $allData    = $this->_model->getAllProduct($where, $pagination);
        $total      = $this->_model->countProduct($where);
        $page_url   = APP_DOMAIN . 'admin/product/index/';
        $pagecode   = $this->setPage($page, $this->pagesize, $total, $page_url);

        $this->getView()->assign(array(
            'baseUrl'           => $baseUrl,
            'allData'           => $allData,
            'categoryOption'    => $categoryOption,
            'category_data'     => $this->categoryType,
            'page'              => $pagecode,
            'total'             => $total,
            'statusOption'      => $statusOption,
            'startTime'         => $startTime,
            'endTime'           => $endTime,
            'title'             => $title,
        ));
    }

    //商品 添加/编辑
    public function addAction() {
        $id         = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $title   = isset($_GET['title']) ? $_GET['title'] : '';
        $url = isset($_GET['url']) ? $_GET['url'] : '';

        if($id > 0){
            $row = $this->_model->getProductById($id);
            if(empty($row['p_id'])){
                Helper_Json::formJson('参数错误');
            }

        }

        //主图
        $picRow = $this->loadModel('ProductPic', array(), 'Mall')->getPicById($id);
        if(is_array($picRow)){
            $count = count($picRow);
        }else{
            $count = 0;
        }

        //标签状态
        $ppType = array();
        $dateHtml = '';
        if ($id) {
            $row           = $this->_model->getProductById($id);
            $status_type   = Helper_Form::option($this->_status, intval($row['p_status']), '');
            // 获得该商品下面的所有组合
            $ppList = $this->loadModel('ProductProfile', array(), 'Mall')->getList(array('p_id' => $id));
            if($ppList){
                foreach($ppList as $val){
                    $ppType[$val['pt_id']] = $val['pt_id'];
                }
            }
        }else {
           // 获得分类树
            $status_type   = Helper_Form::option($this->_status,'','请选择状态');
            $row = array('p_id' => '','pc_id'=>'', 'p_title' => '', 'p_cover' => '','p_content'=>'','p_sales'=>'','p_stock'=>'',
                'p_price'=>'','p_sort' => '','p_status'=>'','p_updateTime' => '','p_addTime' => '',
                );

            $ppList = array();
        }

        $tree = $this->loadModel('Category', array(), 'Mall')->getCategoryTree(FALSE);
        $categoryOption = $this->loadModel('Category', array(), 'Mall')->getCategoryTreeOptions($tree, $row['pc_id']);

         // 获得套餐分类
        $profileTypeOption = Helper_Form::option($this->profileType ? $this->profileType : array(), '', '请选择价格类型');

        $this->getView()->assign(array(
            'categoryOption'    => $categoryOption,
            'status_type'       => $status_type,
            'row'               => $row,
            'picRow'            => $picRow,
            'title'             => $title,
            'count'             => $count,
            'ppList'            => $ppList,
            'ppCount'           => $ppList ? count($ppList) : 0,
            'menuList'          => $this->_menuList,
            'url'               => $url,
            'profileType'       => $this->profileType,
            'profileTypeOption' => $profileTypeOption,
            'ppType'            => $ppType,
        ));
    }

    //上传主图图片
    public function uploadAction() {
        $api = new Qiniu_Api('img');
        $params = array('category'=>'weixin', 'file'=>$_FILES['uploadCover']);
        $ret = $api->uploadImg($params);
        if($ret['code'] == 1) {
            Helper_Json::formJson($ret['data'], 'y');
        } else {
            Helper_Json::formJson($ret['msg'], 'n');
        }
    }

    //上传商品封面图片
    public function upload2Action() {
        $api = new Qiniu_Api('img');
        $params = array('category'=>'weixin', 'file'=>$_FILES['upload']);
        $ret2 = $api->uploadImg($params);
        if($ret2['code'] == 1) {
            Helper_Json::formJson($ret2['data'], 'y');
        } else {
            Helper_Json::formJson($ret2['msg'], 'n');
        }
    }

    //保存商品信息
    public function saveAction() {
        $id           = intval($_POST['id']);
        $pc_id         = intval($_POST['pc_id']);
        $p_title      = $_POST['p_title'];
        $p_cover      = $_POST['p_cover'];
        $p_content    = $_POST['p_content'];
        $p_sales      = intval($_POST['p_sales']);
        $p_stock      = $_POST['p_stock'];
        $p_price      = $_POST['p_price'];
        $p_sort       = $_POST['p_sort'];
        $order        = $_POST['pp_order'];
        $sessionTime  = isset($_SESSION['saveAction']) ? intval($_SESSION['saveAction']) : 0;
        if($sessionTime && time() - $sessionTime < 3){
            Helper_Json::formJson('操作太频繁，请3秒后重试', 'n');
        }

        $_SESSION['saveAction'] = time();

        $data = array(
            'pc_id'     => $pc_id,
            'p_title'   => $p_title,
            'p_cover'   => $p_cover,
            'p_content' => $p_content,
            'p_sales'   => $p_sales,
            'p_stock'   => $p_stock,
            'p_price'   => $p_price,
            'p_sort'    => $p_sort,
            'p_status'  => 2,
        );

        if(empty($_POST['pp_id'])){
            Helper_Json::formJson('请配置套餐价格信息', 'n');
        }

        // 判断商品组合
        foreach($_POST['pp_id'] as $i => $val){
            foreach($val as $j => $v){
                if(empty($_POST['pp_name'][$i][$j])){
                    Helper_Json::formJson('请填写套餐名称', 'n');
                }

                if(empty($_POST['pp_price'][$i][$j]) || !is_numeric($_POST['pp_price'][$i][$j])){
                    Helper_Json::formJson('请正确填写价格', 'n');
                }

                if(!empty($_POST['pp_stock'][$i][$j]) && !is_numeric($_POST['pp_stock'][$i][$j])){
                    Helper_Json::formJson('请正确填写库存', 'n');
                }

                $productProfile[] = array(
                    'pp_id' => $_POST['pp_id'][$i][$j],
                    'pt_id' => $i,
                    'pp_name' => $_POST['pp_name'][$i][$j],
                    'pp_stock' => intval($_POST['pp_stock'][$i][$j]),
                    'pp_price' => floatval($_POST['pp_price'][$i][$j]),
                );
            }
        }

        $fileImg = Helper_Filter::format( $this->getRequest()->getPost('file-title'), TRUE );
        if($fileImg) {
            $data['p_cover'] = $fileImg;
        }

        $file = Helper_Filter::format( $this->getRequest()->getPost('file'), TRUE );
        if($file) {
            $picData['pp_url'] = $file;
        }

        $picData['pp_order'] = $order;
        $content = array();
        //整合图片数据
        if ( $id > 0) {
            //商品信息
            $data['p_updateTime'] = date('Y-m-d H:i:s',time());
            $this->_model->saveProduct($data, $id);
            //商品标签

            //保存商品图片
            for($i = 0; $i < count($picData['pp_url']); $i++){
                $content[] = array(
                    'pp_url'   => trim($picData['pp_url'][$i]),
                    'pp_order' => intval($picData['pp_order'][$i]),
                    'p_id'     => $id
                );
            }

            $this->loadModel('ProductPic', array(), 'Mall')->deletePic($id);
            foreach($content as $v){
                $this->loadModel('ProductPic', array(), 'Mall')->savePic($v);
            }

            $this->addProductProfile($productProfile, $id);
            $tip = '编辑商品成功。';

        } else {
            //商品编号
//            $yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'J');
//            $orderSn = $yCode[intval(date('Y')) - 2011] . strtoupper(dechex(date('m'))) . date('d') . substr(time(), -5) .  sprintf('%02d', rand(0, 99));
//            $data['p_sku'] = $orderSn;
            $data['p_status'] = 2;// 默认是禁用，下架
            //商品信息
            $data['p_addTime'] = date('Y-m-d H:i:s',time());
            $id = $this->_model->saveProduct($data);

            //保存商品图片
            for($i = 0; $i < count($picData['pp_url']); $i++){
                $content[] = array(
                    'pp_url'   => trim($picData['pp_url'][$i]),
                    'pp_order' => intval($picData['pp_order'][$i]),
                    'p_id'     => $id
                );
            }

            $this->loadModel('ProductPic', array(), 'Mall')->deletePic($id);
            foreach($content as $v){
                $this->loadModel('ProductPic', array(), 'Mall')->savePic($v);
            }

            $this->addProductProfile($productProfile, $id);
            $tip = '新增商品成功。';
        }

        $data = array(
            'tip' => $tip,
            'id'  => $id,
        );

        Helper_Json::formJson($data, 'y');
    }

    public function addProductProfile($data, $p_id){
        $profileModel = $this->loadModel('ProductProfile', array(), 'Mall');
        $ppIdList = array();
        if(!empty($data)){
            foreach($data as $val){
                $val['p_id'] = $p_id;
                $pp_id = intval($val['pp_id']);
                if($profileModel->getInfo($pp_id)){
                    // 更新
                    $val['pp_editTime'] = date('Y-m-d H:i:s');
                    $profileModel->saveData($val, $pp_id);
                }else{
                    unset($val['pp_id']);
                    $val['pp_editTime'] = date('Y-m-d H:i:s');
                    $val['pp_addTime'] = date('Y-m-d H:i:s');
                    $pp_id = $profileModel->saveData($val);
                }

                $ppIdList[] = $pp_id;
            }
        }

        // 清除所有该商品下非套餐列表的套餐
        if($ppIdList){
            $profileModel->clearList($p_id, $ppIdList);
        }
    }

    //删除商品列表
    public function deleteAction($id){
        $id = intval($id);
        if(empty($id)){
            Helper_Json::formJson('缺少参数ID');
        }

        //获得商品列表名称
        $row = $this->_model->getProductName($id);
        if(empty($row) || $row['p_status'] != 2){
            Helper_Json::formJson('必须下架商品才可以删除');
        }

        $result = $this->_model->deleteProduct($id);
        if($result){
            Helper_Json::formJson('删除成功', 'y');
        } else {
            Helper_Json::formJson('删除失败');
        }
    }

    //更改状态
    public function statusAction($id, $status) {
        $id = intval($id);
        if( empty($id) ) {
            Helper_Json::formJson('缺失参数');
        }

        $status   = ($status == 1) ? 2: 1;
        $data     = array('p_status'=> $status);

        $result   = $this->_model->changeData($id,$data);
        if($result) {
            Helper_Json::formJson('操作成功', 'y');
        } else {
            Helper_Json::formJson('操作失败');
        }
    }



    public function delProfileAction(){
        $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
        if(empty($id)){
            Helper_Json::formJson('缺失参数');
        }

        $ret = $this->loadModel('ProductProfile', array(), 'Mall')->delData($id);
        if($ret) {
            Helper_Json::formJson('操作成功', 'y');
        } else {
            Helper_Json::formJson('操作失败');
        }
    }

/*
 * 预览商品
 * @param $id 商品id
 */
    public function viewAction(){

        $id         = $_GET['id'];
        if($id > 0){
            $row = $this->_model->getProductById($id,'p_id,p_title');
            if(empty($row['p_id'])){
                Helper_Json::formJson('参数错误');
            }
        }

        $content = $row['p_title'] . "\n\n";
        $content .= "<a href='http://property.comylife.com/tourism/product/details/pid/".$row['p_id']."/'>点击链接预览效果</a>\n\n";

        //第一个参数运营后台登录名，第二个参数发送内容，注意区分商品和旅游
        $ret= Open_QQ_QyWeixin::sendMessage(U_NAME, $content, 0);

        if($ret['errmsg']=='ok'){
            Helper_Json::formJson('推送企业号成功', 'y');
        }else{
            Helper_Json::formJson('推送企业号失败', 'n');
        }
    }

    public function addProfileAction(){
        $pt_id = isset($_POST['pt_id']) ? intval($_POST['pt_id']) : 0;
        $count = isset($_POST['ppCount']) ? intval($_POST['ppCount']) : 0;
        $ptInfo = $this->loadModel('ProfileType', array(), 'Mall')->getInfo($pt_id);
        $this->getView()->assign('pt_id', $pt_id);
        $this->getView()->assign('ptInfo', $ptInfo);
        $this->getView()->assign('count', $count);
        $this->getView()->display('/product/load.html');
        die;
    }


}

