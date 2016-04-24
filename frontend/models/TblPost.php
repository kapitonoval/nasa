<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_post}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $anons
 * @property string $description
 */
class TblPost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_post}}';
    }

    /**
     * @return array primary key of the table
     */     
    public static function primaryKey()
    {
        return array('id');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'anons', 'description'], 'required'],
            [['anons'], 'string'],
            [['title', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'anons' => 'Anons',
            'description' => 'Description',
        ];
    }
}
