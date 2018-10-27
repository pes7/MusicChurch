<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "partitura".
 *
 * @property int $id
 * @property string $caption
 */
class Partitura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partitura';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['caption'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'caption' => 'Caption',
        ];
    }
}
