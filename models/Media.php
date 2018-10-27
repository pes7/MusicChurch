<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "media".
 *
 * @property int $id
 * @property int $referenceIdPartitura
 * @property int $referenceIdNews
 * @property int $referenceIdGallery
 * @property string $caption
 * @property string $src
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
            [['caption', 'src'], 'string', 'max' => 32],
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
        ];
    }
}
