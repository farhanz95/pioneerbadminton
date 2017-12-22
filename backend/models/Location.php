<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property integer $location_id
 * @property string $location_name
 * @property string $daerah_id
 *
 * @property Court[] $courts
 * @property MasterDaerah $daerah
 */
class Location extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'location';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['location_id', 'daerah_id'], 'integer'],
            [['location_name'], 'string', 'max' => 255],
            [['location_name'], 'required'],
            [['daerah_id'], 'exist', 'skipOnError' => true, 'targetClass' => Daerah::className(), 'targetAttribute' => ['daerah_id' => 'daerah_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'location_id' => 'Location ID',
            'location_name' => 'Location Name',
            'daerah_id' => 'Daerah ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourts()
    {
        return $this->hasMany(Court::className(), ['location_id' => 'location_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDaerah()
    {
        return $this->hasOne(Daerah::className(), ['daerah_id' => 'daerah_id']);
    }
}
