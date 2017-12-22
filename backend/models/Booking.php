<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "booking".
 *
 * @property integer $booking_id
 * @property string $booking_name
 * @property string $booking_status
 * @property string $booking_type
 * @property string $booking_date
 * @property string $booking_ip
 * @property integer $booking_activeness
 * @property integer $court_id
 * @property integer $booking_parent_id
 *
 * @property Court $court
 */
class Booking extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $date_start_end;
    public $location;

    public static function tableName()
    {
        return 'booking';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['booking_id', 'booking_activeness', 'court_id', 'booking_parent_id','booking_status'], 'integer'],
            // [['booking_date'], 'date', 'timestampAttribute' => 'booking_date'],
            [['booking_name','date_start_end','court_id'], 'required'],
            [['booking_code','booking_name', 'booking_type', 'ip_address'], 'string', 'max' => 255],
            [['court_id'], 'exist', 'skipOnError' => true, 'targetClass' => Court::className(), 'targetAttribute' => ['court_id' => 'court_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'booking_id' => 'Booking ID',
            'booking_id' => 'Booking Code',
            'booking_name' => 'Booking Name',
            'submitted_date' => 'Submitted Date',
            'booking_status' => 'Booking Status',
            'booking_type' => 'Booking Type',
            'booking_date' => 'Booking Date',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'ip_address' => 'Ip Address',
            'booking_activeness' => 'Booking Activeness',
            'court_id' => 'Court',
            'booking_parent_id' => 'Booking Parent ID',
            'user_id' => 'User',
        ];
    }

     public function beforeSave($insert){
        if (parent::beforeSave($insert)) {
            if($insert){

            }else{
                if(isset($_POST['Booking']['booking_date'])){
                    $this->booking_date = date_format(date_create($this->booking_date),'Y-m-d H:i:s');
                }
                if(isset($_POST['Booking']['start_time'])){

                    $booking_date = date_format(date_create($this->booking_date),'Y-m-d');

                    $start_time = date_format(date_create($this->start_time),'H:i:s');

                    $dateStart = $booking_date.' '.$start_time;

                    $this->start_time = $dateStart;
                }
                if(isset($_POST['Booking']['end_time'])){

                    $booking_date = date_format(date_create($this->booking_date),'Y-m-d');

                    $end_time = date_format(date_create($this->end_time),'H:i:s');

                    $dateEnd = $booking_date.' '.$end_time;

                    $this->end_time = $dateEnd;

                }
                if(isset($_POST['Booking']['date_start_end'])){

                    $date = explode(' - ',$this->date_start_end);

                    $this->start_time = date_format(date_create($date[0]),'Y-m-d H:i:s');

                    $this->end_time = date_format(date_create($date[1]),'Y-m-d H:i:s');

                }
            } 
            return true;
        }
        return false;
    } 

    public function afterFind(){
        // $this->start_time = date_format(date_create($this->start_time),'h:i:s A');
        // $this->end_time = date_format(date_create($this->end_time),'h:i:s A');

        $this->date_start_end = date_format(date_create($this->start_time),'Y-m-d H:i:s').' - '.date_format(date_create($this->end_time),'Y-m-d H:i:s');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourt()
    {
        return $this->hasOne(Court::className(), ['court_id' => 'court_id']);
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getLengthTimeBooked()
    {
        $d1 = new \DateTime($this->start_time);
        $d2 = new \DateTime($this->end_time);
        $diff = $d2->diff($d1);

        // $diff->h." HOURS ".$diff->i." MINUTES";
        return $diff->format('%a DAY %h HOUR %i MINUTE ')."\n";
    }

    public function getBookingStatusName(){
        if ($this->booking_status == 1) {
            return "<span class='label label-lg label-danger fsi fwi'>Not Confirmed</span>";
        }
        if ($this->booking_status == 2) {
            return "<span class='label label-lg label-warning fsi fwi'>Confirmed</span>";
        }
        if ($this->booking_status == 3) {
            return "<span class='label label-lg label-success fsi fwi'>Paid</span>";
        }
    }
}
