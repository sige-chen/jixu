<?php
namespace app\modules\admin\models;
use Yii;
use yii\base\Model;
use app\models\MdlAdminUsers;
/**
 * LoginForm is the model behind the login form.
 * @property User|null $user This property is read-only.
 */
class FrmLogin extends Model {
    /**
     * @var unknown
     */
    public $username;
    /**
     * @var unknown
     */
    public $password;
    /**
     * @var string
     */
    public $rememberMe = true;
    /**
     * @var string
     */
    private $_user = false;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params) {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || ($user->password !== strtoupper(md5($this->password))) ) {
                $this->addError($attribute, '无效的用户名或密码');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login() {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     * @return User|null
     */
    public function getUser() {
        if ($this->_user === false) {
            $this->_user = MdlAdminUsers::findOne(['username'=>$this->username]);
        }
        return $this->_user;
    }
}
