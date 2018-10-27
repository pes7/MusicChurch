<?php

namespace app\models;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $username
 * @property int $password
 * @property string $email
 * @property int $isAdmin
 * @property string $authKey
 * @property string $accessKey
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['isAdmin'], 'integer'],
            
            ['name','required'],
            ['name','trim'],
            ['name','string','min'=>3,'max'=>32],
            
            ['surname','required'],
            ['surname','trim'],
            ['surname','string','min'=>3,'max'=>32],
            
            ['username','required'],
            ['username','trim'],
            ['username','unique','targetClass'=>'app\models\User','message'=>'Этот логин уже взят.'],
            ['username','string','min'=>6,'max'=>32],
            
            ['password','required'],
            ['password','string','min'=>6],
            
            ['email','required'],
                
            [['authKey','accessKey'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'username' => 'Логин',
            'password' => 'Пароль',
            'email' => 'Почта',
            'isAdmin' => 'Админ ли?',
            'authKey' => 'Ключ Аунтификации',
            'accessKey' => 'Ключ Доступа',
        ];
    }
    
    public function signup(): User{
        if(!$this->validate())
            return null;
        
        $user = new User();
        $user->username = $this->username;
        $user->setPassword($this->password);
        $user->name = $this->name;
        $user->surname = $this->surname;
        $user->email = $this->email;
        $user->isAdmin = $this->isAdmin;
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }
    
    public function setPassword($password){
        $this->password = base64_encode($password);
    }

    public function generateAuthKey(){
        $this->authKey = \Yii::$app->security->generateRandomKey();
        $this->accessKey = \Yii::$app->security->generateRandomString();
    }

    public function isAdmin():bool{
        return $this->isAdmin == 1 ? true : false;
    }

    public function getAuthKey(): string {
        return $this->authKey;
    }

    public function getId() {
        return $this->id;
    }

    public function validateAuthKey($authKey): bool {
        return $this->authKey === $authKey;
    }
    
    public function validatePassword($password){
        return $this->password === base64_encode($password);
    }
    
    public static function findByUsername($username){
        return self::findOne(['username'=>$username]);
    }

    public static function findIdentity($id) {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null): \yii\web\IdentityInterface {
        throw new \yii\base\NotSupportedException();
    }
}
