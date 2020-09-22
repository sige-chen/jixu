<?php
namespace app\modules\admin\controllers;
use yii\web\Controller;
use app\modules\admin\helpers\WebController;
use app\models\MdlConfigurations;
/**
 * Default controller for the `admin` module
 */
class SettingController extends WebController {
    /**
     * @var string
     */
    public $layout = '@app/modules/admin/views/layouts/adminlet-content';
    
    /**
     * @var boolean
     */
    public $enableCsrfValidation = false;
    
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        $this->activeMenuItem('setting');
        
        $settings = MdlConfigurations::find()->all();
        return $this->render('index',['settings'=>$settings]);
    }
    
    /**
     * 保存配置
     * @return string
     */
    public function actionSave() {
        $form = $this->request->post('form');
        foreach ( $form as $item => $value ) {
            $setting = MdlConfigurations::findOne(['key'=>$item]);
            $setting->value = $value;
            $setting->save();
        }
        return $this->redirect(['setting/index']);
    }
}
