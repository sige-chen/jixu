<?php
namespace app\modules\frontend\controllers;
use app\modules\frontend\helpers\WebController;
use app\models\MdlInquiry;
class InquiryController extends WebController {
    /**
     * @var string
     */
    public $layout = '@app/modules/frontend/views/layouts/content';
    
    /**
     * 保存请求
     * @return string
     */
    public function actionSave() {
        $inquiry = new MdlInquiry();
        $inquiry->user_id = \Yii::$app->user->isGuest ? 0 : \Yii::$app->user->id;
        $inquiry->created_at = date('Y-m-d H:i:s');
        $inquiry->setAttributes($this->request->post('form'));
        if ( !$inquiry->save() ) {
            \Yii::$app->getSession()->setFlash('error', $inquiry->getErrorSummary(true));
        } else {
            \Yii::$app->getSession()->setFlash('success', '申请已发送');
        }
        return $this->redirect(['inquiry/result']);
    }
    
    /**
     * 请求结果
     * @return string
     */
    public function actionResult () {
        $this->setPageTitle('申请结果');
        return $this->render('result');
    }
}