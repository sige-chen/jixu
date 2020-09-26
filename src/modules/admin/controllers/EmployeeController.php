<?php
namespace app\modules\admin\controllers;
use app\modules\admin\helpers\WebController;
use app\models\MdlAdminUsers;
use yii\web\HttpException;
use app\modules\admin\assets\AdminAsset;
class EmployeeController extends WebController {
    /**
     * @var string
     */
    public $layout = '@app/modules/admin/views/layouts/adminlet-content';
    
    /**
     * 职员列表
     * @return string
     */
    public function actionIndex() {
        $this->activeMenuItem('employee');
        
        $admins = MdlAdminUsers::find()->all();
        return $this->render('index',['admins'=>$admins]);
    }
    
    /**
     * 职员删除
     * @param int $admin
     * @return string
     */
    public function actionDelete( $admin ) {
        $admin = MdlAdminUsers::findOne($admin);
        if ( null !== $admin ) {
            $admin->delete();
        }
        return $this->redirect(['employee/index']);
    }
    
    /**
     * 职员编辑
     * @return string
     */
    public function actionEdit( $admin=null ) {
        $this->activeMenuItem('employee');
        if ( !empty($admin) ) {
            $admin = MdlAdminUsers::findOne($admin);
        } else {
            $admin = new MdlAdminUsers();
        }
        if ( null === $admin ) {
            throw new HttpException(404);
        }
        return $this->render('edit',['admin'=>$admin]);
    }
    
    /**
     * 职员信息保存
     * @return void
     */
    public function actionSave() {
        $id = $this->request->post('id');
        if ( !empty($id) ) {
            $admin = MdlAdminUsers::findOne($id);
        } else {
            $admin = new MdlAdminUsers();
            $admin->photo_url = AdminAsset::getResUrl('img/avatar.jpg');
        }
        
        $admin->setAttributes($this->request->post('form'));
        $admin->password = md5($admin->password);
        if ( !$admin->save() ) {
            return $this->goBackWithError($admin->getErrorSummary(true));
        }
        return $this->redirect(['employee/index']);
    }
}