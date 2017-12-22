<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_negeri".
 *
 * @property string $negeri_id
 * @property string $negeri_nama
 * @property integer $negeri_aktif
 *
 * @property MasterDaerah[] $masterDaerahs
 */
class Negeri extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master_negeri';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['negeri_nama'], 'required'],
            [['negeri_aktif'], 'integer'],
            [['negeri_nama'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'negeri_id' => 'Negeri ID',
            'negeri_nama' => 'Negeri Nama',
            'negeri_aktif' => 'Negeri Aktif',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMasterDaerahs()
    {
        return $this->hasMany(MasterDaerah::className(), ['negeri_id' => 'negeri_id']);
    }
}
