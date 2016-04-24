<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_post}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $pub_date
 * @property string $up_date
 * @property string $img
 * @property string $link_to_nasa
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
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'pub_date', 'img', 'link_to_nasa'], 'required'],
            [['pub_date', 'up_date'], 'safe'],
            [['title', 'description', 'img', 'link_to_nasa'], 'string', 'max' => 255],
        ];
    }

    /**
     * @return mixed
     */
    public function getImageurl()
    {
//        return 'img';
        return '../../upload-content/img/'.$this->img;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'pub_date' => 'Pub Date',
            'up_date' => 'Up Date',
            'img' => 'Img',
            'link_to_nasa' => 'Link To Nasa',
        ];
    }
}
