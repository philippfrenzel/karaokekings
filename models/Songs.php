<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "songs".
 *
 * @property integer $id
 * @property string $title
 * @property string $artist
 * @property string $lyrics
 * @property string $year
 * @property integer $duo
 * @property string $tags
 * @property string $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $deleted_at
 */
class Songs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%songs}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'artist', 'lyrics'], 'string'],
            [['duo', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['created_at', 'updated_at'], 'required'],
            [['year', 'tags', 'status'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'artist' => Yii::t('app', 'Artist'),
            'lyrics' => Yii::t('app', 'Lyrics'),
            'year' => Yii::t('app', 'Year'),
            'duo' => Yii::t('app', 'Duo'),
            'tags' => Yii::t('app', 'Tags'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'deleted_at' => Yii::t('app', 'Deleted At'),
        ];
    }
}
