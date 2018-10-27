<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bible".
 *
 * @property int $id
 * @property string $text
 * @property string $url
 */
class Bible extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bible';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'string', 'max' => 128],
            [['url'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'url' => 'Url',
        ];
    }
}
