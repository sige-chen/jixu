<?php
namespace app\models;
use Yii;
use app\helpers\JxDictionary;
/**
 * @property int $id ID
 * @property string $name 名称
 * @property string|null $published_at 上架时间
 * @property string $thumbnail_url
 * @property int $price
 * @property int $status
 * @property int $preferential_price
 * @property int $description
 * @property int $is_suggested
 * @property int $short_desc
 * @property string $taobao_link
 * @property string $online_book_url
 * 
 * @property-read int $videoCollectionCount
 * @property-read int $bookLinkCount
 * @property-read boolean $hasOnlineBook
 * @property-read int $bookAttachmentCount
 * @property-read int $userCollectionCount
 * @property-read int $userPurchaseCount
 * @property-read int $isCollected
 * @property-read int $isPurchased
 */
class MdlCourses extends \yii\db\ActiveRecord {
    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'jx_courses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['name'], 'required'],
            [['published_at','description','status','is_suggested', 'short_desc','teacher_id','short_name'], 'safe'],
            [['thumbnail_url','taobao_link','online_book_url'], 'string', 'max' => 255],
            
            [['name'], 'string', 'max' => 32],
            [['price','preferential_price'],'number','max'=>10000000,'min'=>0],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => '名称',
            'price' => '原价',
            'preferential_price' => '优惠价'
        ];
    }
    
    /**
     * @return number|string
     */
    public function getVideoCollectionCount() {
        return MdlCourseVideoCollections::find()->where(['course_id'=>$this->id])->count();
    }
    
    public function getBookLinkCount() {
        return MdlCourseBookLinks::find()->where(['course_id'=>$this->id])->count();
    }
    
    public function getBookAttachmentCount() {
        return MdlCourseBookAttachments::find()->where(['course_id'=>$this->id])->count();
    }
    
    public function getUserCollectionCount() {
        return MdlUserCourseCollections::find()->where(['course_id'=>$this->id])->count();
    }
    public function getUserPurchaseCount() {
        return MdlUserCoursePurchases::find()->where(['course_id'=>$this->id])->count();
    }
    public static function getOnSellCount() {
        return self::find()->where(['status'=>JxDictionary::value('COURSE_STATUS', 'ONSELL')])->count();
    }
    
    /**
     * 获取是否存在在线版本的教材
     * @return boolean
     */
    public function getHasOnlineBook() {
        return 0 < strlen(trim($this->online_book_url));
    }
    
    /**
     * 获取教师信息
     * @return \app\models\MdlAdminUsers
     */
    public function getTeacher() {
        return MdlAdminUsers::findOne($this->teacher_id);
    }
    
    /**
     * 获取是否已经标记收藏
     * @return boolean
     */
    public function getIsCollected() {
        return MdlUserCourseCollections::find()->where([
            'user_id' => \Yii::$app->user->id,
            'course_id' => $this->id,
        ])->exists();
    }
    
    /**
     * 获取是否购买
     * @return boolean
     */
    public function getIsPurchased() {
        return MdlUserCoursePurchases::find()->where([
            'user_id' => \Yii::$app->user->id,
            'course_id' => $this->id,
        ])->exists();
    }
}
