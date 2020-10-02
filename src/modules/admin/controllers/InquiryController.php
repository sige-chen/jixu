<?php
namespace app\modules\admin\controllers;
use app\modules\admin\helpers\WebController;
use app\models\MdlInquiry;
/**
 * Default controller for the `admin` module
 */
class InquiryController extends WebController {
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
    public $activeMenuItem = 'inquiry';
    
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        $inquiries = MdlInquiry::find()->orderBy(['id'=>SORT_DESC])->all();
        return $this->render('index',['inquiries'=>$inquiries]);
    }
    
    /**
     * 咨询删除
     * @param int $admin
     * @return string
     */
    public function actionDelete( $id ) {
        $inquiry = MdlInquiry::findOne($id);
        if ( null !== $inquiry ) {
            $inquiry->delete();
        }
        return $this->redirect(['inquiry/index']);
    }
}
