<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_daerah".
 *
 * @property string $daerah_id
 * @property string $daerah_nama
 * @property string $negeri_id
 *
 * @property Location[] $locations
 * @property MasterNegeri $negeri
 */
class Daerah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master_daerah';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['negeri_id'], 'integer'],
            [['daerah_nama'], 'string', 'max' => 255],
            [['daerah_nama'], 'unique'],
            [['daerah_nama'], 'required'],
            [['negeri_id'], 'exist', 'skipOnError' => true, 'targetClass' => Negeri::className(), 'targetAttribute' => ['negeri_id' => 'negeri_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'daerah_id' => 'Daerah ID',
            'daerah_nama' => 'Daerah Nama',
            'negeri_id' => 'Negeri ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocations()
    {
        return $this->hasMany(Location::className(), ['daerah_id' => 'daerah_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNegeri()
    {
        return $this->hasOne(Negeri::className(), ['negeri_id' => 'negeri_id']);
    }
}
