<?php

namespace frontend\controllers;

use Yii;
use app\models\Booking;
use app\models\Court;
use frontend\models\BookingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * BookingController implements the CRUD actions for Booking model.
 */
class BookingController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Booking models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BookingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Booking model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Booking model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Booking();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->booking_code = 'B-'.$model->court->court_id.'-'.str_pad($model->booking_id,2,"0",STR_PAD_LEFT);
            $model->ip_address = Yii::$app->audit->getClientIP();
            $model->submitted_date = date('Y-m-d H:i:s');
            $model->user_id = Yii::$app->user->id;
            
            if ($model->save()) {
            }else{
                var_dump(\yii\widgets\ActiveForm::validate($model));die;
            }

            return $this->redirect(['view', 'id' => $model->booking_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Booking model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->booking_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionGetCourt(){
        $location_id = Yii::$app->request->post('location_id');

        $courtArray = ArrayHelper::map(Court::find()->where(['location_id'=>$location_id])->asArray()->all(),'court_id','court_name');

        echo "<option value=''>-Select Court-</option>";

        foreach ($courtArray as $key => $val) {
            echo "<option value=".$key.">".$val."</option>";
        }
    }

    public function actionGetDateLength(){
        $booking_date = Yii::$app->request->post('booking_date');

        $date = explode(' - ',$booking_date);

        $start_time = date_format(date_create($date[0]),'Y-m-d H:i:s');

        $end_time = date_format(date_create($date[1]),'Y-m-d H:i:s');

        $d1 = new \DateTime($start_time);
        $d2 = new \DateTime($end_time);
        $diff = $d2->diff($d1);

        // $diff->h." HOURS ".$diff->i." MINUTES";
        return $diff->format('%a DAY %h HOUR %i MINUTE ')."\n";
    }

    /**
     * Deletes an existing Booking model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Booking model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Booking the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Booking::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionBulk(){

    $action=Yii::$app->request->post('action');
    $selection=(array)Yii::$app->request->post('selection');

    foreach($selection as $id){
        $booking = Booking::findOne($id);

        if ($action == 'd') {
            $booking->delete();
        }
    }

    return $this->redirect(Yii::$app->request->referrer);

    }

}
