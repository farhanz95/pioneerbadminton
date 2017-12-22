<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "court".
 *
 * @property integer $court_id
 * @property string $court_name
 * @property integer $location_id
 *
 * @property Booking[] $bookings
 * @property Location $location
 */
class Court extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'court';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['court_id'], 'required'],
            [['court_id', 'location_id'], 'integer'],
            [['court_name'], 'string', 'max' => 255],
            [['court_name'],'required'],
            [['location_id'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['location_id' => 'location_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'court_id' => 'Court ID',
            'court_name' => 'Court Name',
            'location_id' => 'Location ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Booking::className(), ['court_id' => 'court_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['location_id' => 'location_id']);
    }
}
