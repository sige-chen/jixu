<?php
namespace app\modules\admin\controllers;
use app\modules\admin\helpers\WebController;
use app\models\MdlAdvertisements;
use app\modules\admin\assets\AdminAsset;
class AdvertisementController extends WebController {
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
    public $activeMenuItem = 'advertisement';
    
    /**
     * 广告列表
     * @return string
     */
    public function actionIndex() {
        $ads = MdlAdvertisements::find()->all();
        return $this->render('index',['ads'=>$ads]);
    }
    
    /**
     * 编辑广告
     * @return string
     */
    public function actionEdit( $id=null ) {
        $ad = new MdlAdvertisements();
        $ad->image_url = AdminAsset::getResUrl('img/img-default.png');
        $ad->target_url = '#';
        if ( null !== $id ) {
            $ad = MdlAdvertisements::findOne($id);
        }
        return $this->render('edit',['ad'=>$ad]);
    }
    
    /**
     * 保存广告
     * @return string
     */
    public function actionSave() {
        $id = $this->request->post('id');
        if ( !empty($id) ) {
            $ad = MdlAdvertisements::findOne($id);
        } else {
            $ad = new MdlAdvertisements();
        }
        
        $ad->setAttributes($this->request->post('form'));
        if ( !$ad->save() ) {
            return $this->goBackWithError($ad->getErrorSummary(true));
        }
        return $this->redirect(['advertisement/index']);
    }
    
    /**
     * 职员删除
     * @param int $admin
     * @return string
     */
    public function actionDelete( $id ) {
        $ad = MdlAdvertisements::findOne($id);
        if ( null !== $ad ) {
            $ad->delete();
        }
        return $this->redirect(['advertisement/index']);
    }
}