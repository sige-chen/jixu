<?php
namespace app\modules\admin\controllers;
use app\modules\admin\helpers\WebController;
use app\models\MdlCompanyPartners;
use app\modules\admin\assets\AdminAsset;
class PartnerController extends WebController {
    /**
     * @var string
     */
    public $layout = '@app/modules/admin/views/layouts/adminlet-content';
    
    /**
     * @var boolean
     */
    public $enableCsrfValidation = false;
    
    /**
     * @var string
     */
    public $activeMenuItem = 'partner';
    
    /**
     * 合作方列表
     * @return string
     */
    public function actionIndex() {
        $partners = MdlCompanyPartners::find()->orderBy(['id'=>SORT_DESC])->all();
        return $this->render('index',['partners'=>$partners]);
    }
    
    /**
     * 编辑合作方
     * @return string
     */
    public function actionEdit( $id=null ) {
        $partner = new MdlCompanyPartners();
        $partner->logo_url = AdminAsset::getResUrl('img/dot.png');
        if ( null !== $id ) {
            $partner = MdlCompanyPartners::findOne($id);
        }
        return $this->render('edit',['partner'=>$partner]);
    }
    
    /**
     * 保存合作方
     * @return string
     */
    public function actionSave() {
        $id = $this->request->post('id');
        if ( !empty($id) ) {
            $partner = MdlCompanyPartners::findOne($id);
        } else {
            $partner = new MdlCompanyPartners();
        }
        
        $partner->setAttributes($this->request->post('form'));
        if ( !$partner->save() ) {
            return $this->goBackWithError($partner->getErrorSummary(true));
        }
        return $this->redirect(['partner/index']);
    }
    
    /**
     * 合作方删除
     * @param int $admin
     * @return string
     */
    public function actionDelete( $id ) {
        $partner = MdlCompanyPartners::findOne($id);
        if ( null !== $partner ) {
            $partner->delete();
        }
        return $this->redirect(['partner/index']);
    }
}