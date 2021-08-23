<?php

namespace app\controllers;

use Yii;
use app\models\Personal;
use app\models\Fichajes;

use app\models\PersonalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use kartik\widgets\Growl;
/**
 * PersonalController implements the CRUD actions for Personal model.
 */
class PersonalController extends Controller
{
   public $enableCsrfValidation = false;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Personal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Personal model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Personal #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new Personal model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Personal();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new Personal",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])

                ];
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Create new Personal",
                    'content'=>'<span class="text-success">Create Personal success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])

                ];
            }else{
                return [
                    'title'=> "Create new Personal",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])

                ];
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
              return $this->redirect(['view', 'id' => $model->legajo]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }

    }

    /**
     * Updates an existing Personal model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update Personal #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Personal #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];
            }else{
                 return [
                    'title'=> "Update Personal #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->legajo]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }
    public function cantidadHSC( $marked_string="") {
    //remove the marked zero's
      $my_date = $marked_string;
      $date_time = new \DateTime($my_date);

    //remove the marked zero's
     $hora = ($date_time->format('G'));
     $minutos = intval($date_time->format('i').PHP_EOL);
     $segundos ="00";

      //Remove Reaming
      $cleaned_string = $hora.":". $minutos.":".$segundos;
      return $cleaned_string;

    }

    public function tiemposinceros( $marked_string="") {

      $my_date = $marked_string;
      $date_time = new \DateTime($my_date);
      //remove the marked zero's
      $hora = intval($date_time->format('H').PHP_EOL);
      $minutos = intval($date_time->format('i').PHP_EOL);
      $segundos = intval($date_time->format('s'));
      //Remove Reaming
      $cleaned_string = $hora.":". $minutos.":".$segundos;
      return $cleaned_string;

    }

    public function calculoHoras($fs ,$fichado){
      $horariosalida= $this->tiemposinceros($fs);
      list($horasS, $minutosS, $segundosS) = explode(':', date("H:i:s"));
      $salida_en_segundos = ($horasS * 3600 ) + ($minutosS * 60 ) + $segundosS;

      list($horaI,$minutosI,$segundosI) = explode(':', $fichado->hora_ingreso);
      $ingreso_en_segundos = ($horaI * 3600 ) + ($minutosI * 60 ) + $segundosI;

      $resultadoSegundos=$salida_en_segundos - $ingreso_en_segundos;

      $cantidadhoras=  gmdate("H:i:s", $resultadoSegundos);

       $cantidadhoras=$this->cantidadHSC(date("Y-m-d")." ".$cantidadhoras);
       return $cantidadhoras;

    }
    public function fichar($legajo ,$tipo,$modelFichaje){
      // validar si hay algun error
      //Verifico si es salida o entrado en la variable $tipo
      if($tipo=="entrada"){
            $fichaje= new Fichajes();
          // Seteo los datos
          //Fecha de Ingreso
            $date = explode("/",date('j/n/Y'));
            list($dia,$mes,$año) = $date;
            $fechaIng= $dia.'/'.$mes.'/'.$año;
          //FI
            $fi= date("Y-m-d H:i:s");
          //HORA DE Ingreso
            $horarioentrada=	$this->tiemposinceros($fi);
            $fichaje->fecha_ingreso=$fechaIng;
            $fichaje->fi=$fi;
            $fichaje->hora_ingreso= $horarioentrada;
            $fichaje->fecha_salida=NULL;
            $fichaje->fs=NULL;
            $fichaje->hora_salida=NULL;
            $fichaje->persona=$legajo;
            $fichaje->cant_horas= '00:00:00';
            $fichaje->observaciones=NULL;
            $fichaje->licencia='0';
            $fichaje->save();
      }
      if ($tipo=="salida"){
        // seteo los datos
        // Fecha de salida
        $date = explode("/",date('j/n/Y'));
        list($dia,$mes,$año) = $date;
        $fechaSalida= $dia.'/'.$mes.'/'.$año;
        // FECHA SALIDA
        $fs= date("Y-m-d H:i:s");
        //HORA DE Salida
        $horariosalida= $this->tiemposinceros($fs);
        $cantidadhoras= $this->calculoHoras($fs,$modelFichaje);
        //

        $modelFichaje->fecha_salida=$fechaSalida;
        $modelFichaje->fs=$fs;
        $modelFichaje->hora_salida=$horariosalida;
        $modelFichaje->persona=$legajo;
        $modelFichaje->cant_horas= $cantidadhoras;
        $modelFichaje->observaciones=NULL;
        $modelFichaje->licencia='0';
        $modelFichaje->save();
      }

        return true;
    }
    public function menosMinuto($fichado){
        $fechaSalida= date("Y-m-d H:i:s");
        $cantidadhoras= $this->calculoHoras($fechaSalida,$fichado);

        $tiempo = explode(":",$cantidadhoras);
        list($hora,$minutos,$segundos) = $tiempo;

        if($hora > 1){
          return false;
        }elseif ($minutos<1) {
          return true;
        }else {
          return false;
        }

    }
    public function actionFichado(){

      // busco si esta en personal atraves del dni obtengo el legajo
      if (isset($_POST['dni'])) {

          $data = Yii::$app->request->post();
          $dni= explode(":", $data['dni']);
          $documento= $dni[0];
          $model = new Personal();
        $personal=  $model::find()->where(['dni' => $documento])->one();

          if (!empty($personal)){
                $legajo=  $personal->legajo;
                $modelfichado= new Fichajes();
                $date = explode("/",date('j/n/Y'));
                list($dia,$mes,$año) = $date;
                $dia= $dia.'/'.$mes.'/'.$año;

                $fichado=  $modelfichado::find()->where(['and',"fecha_ingreso = '".$dia."' and persona = ".$legajo." and fecha_salida IS NULL" ])->one();
                if ($fichado==null){
                  $this->fichar($legajo, "entrada", null);
                    Yii::$app->getSession()->setFlash('success', [
                        'type' => 'success',
                        'duration' => 6000,
                        'icon' => 'fa fa-success',
                        'message' => 'SE HA FICHADO CORRECTAMENTE SU ENTRADA.',
                        'title' => 'NOTIFICACIÓN',
                        'positonY' => 'top',
                        'positonX' => 'right'
                    ]);
                    $fichados=  $modelfichado::find()->where(['and',"fecha_ingreso = '".$dia."' and persona = ".$legajo ])->all();
                    return $this->render('/site/index',['fichados'=>$fichados, "personal"=>$personal]);

                }
                  else {

                    // No deja fichar menos de un minuto
                    if($this->menosMinuto($fichado)){
                          Yii::$app->getSession()->setFlash('danger', [
                              'type' => 'danger',
                              'duration' => 6000,
                              'icon' => 'fa fa-danger',
                              'message' => 'NO SE HA REGISTRADO SU FICHADA(MENOS DE 1 MIN)',
                              'title' => 'NOTIFICACIÓN',
                              'positonY' => 'top',
                              'positonX' => 'right'
                          ]);
                          return $this->redirect(['site/index']);
                    }
                    $this->fichar($legajo, "salida", $fichado);
                      Yii::$app->getSession()->setFlash('success', [
                          'type' => 'success',
                          'duration' => 6000,
                          'icon' => 'fa fa-success',
                          'message' => 'SE HA FICHADO CORRECTAMENTE SU SALIDA.',
                          'title' => 'NOTIFICACIÓN',
                          'positonY' => 'top',
                          'positonX' => 'right'
                      ]);
                      $fichados=  $modelfichado::find()->where(['and',"fecha_ingreso = '".$dia."' and persona = ".$legajo ])->all();
                      return $this->render('/site/index',['fichados'=>$fichados, "personal"=>$personal]);

                  }
        } else {
            Yii::$app->getSession()->setFlash('danger', [
                'type' => 'danger',
                'duration' => 6000,
                'icon' => 'fa fa-danger',
                'message' => 'NO SE HA REGISTRADO SU FICHADA',
                'title' => 'NOTIFICACIÓN',
                'positonY' => 'top',
                'positonX' => 'right'
            ]);
            return $this->redirect(['site/index']);
          }
      }


      return $this->redirect(['site/index']);


    }
    /**
     * Delete an existing Personal model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }

     /**
     * Delete multiple existing Personal model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionBulkDelete()
    {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }

    }

    /**
     * Finds the Personal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Personal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Personal::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
