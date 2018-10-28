<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "media".
 *
 * @property int $id
 * @property int $referenceIdPartitura
 * @property int $referenceIdNews
 * @property int $referenceIdGallery
 * @property string $caption
 * @property string $src
 * @property file @con
 */
class Media extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'media';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['referenceIdPartitura', 'referenceIdNews', 'referenceIdGallery'], 'integer'],
            [['caption','src',], 'string', 'max' => 64],
            ['con','file','skipOnEmpty' => false,'maxSize'=>1024*1024*8,'extensions' => 'pdf,mp3,png,jpg']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'referenceIdPartitura' => 'Reference Id Partitura',
            'referenceIdNews' => 'Reference Id News',
            'referenceIdGallery' => 'Reference Id Gallery',
            'caption' => 'Caption',
            'src' => 'Src',
            'con'=>'Content'
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $this->con->saveAs('E:\XamPP\htdocs\test\media/' . $this->con->baseName . '.' . $this->con->extension,false);
            $this->src = '/media/'.$this->con->baseName . '.' . $this->con->extension;
            $this->save();
               return true;
        } else {
            return false;
        }
    }
}
