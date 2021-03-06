<?php

namespace app\controllers;

use Yii;
use app\models\Songs;
use app\models\SongsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use SimpleXMLElement;
use Guzzle\Http\Client;
use yii\helpers\Html;

/**
 * SongsController implements the CRUD actions for Songs model.
 */
class SongsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Songs models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SongsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Songs model.
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
     * Display a single Songs
     * @param integer id
     * @return mixed
     */
    public function actionSongview($id)
    {
        //first we load the model
        $model = $this->findModel($id);
        $lyrics = NULL;
        $lastfm = NULL;

        //access data from the chartlyrics api:
        try
        {
            $ServiceUrl = Html::decode('http://api.chartlyrics.com/apiv1.asmx/SearchLyricDirect');
            $client = new Client();
            $request = $client->createRequest('GET', $ServiceUrl);
            
            $query = $request->getQuery();
            $query->set('artist',$model->artist);
            $query->set('song',$model->title);

            try
            {
                $res = $client->send($request);
                $lyrics = $res->xml();
                if($lyrics->Lyric != '' && $model->lyrics != $lyrics->Lyric)
                {
                    $model->lyrics = $lyrics->Lyric;
                    $model->save();
                }
            }
            catch (\Guzzle\Http\Exception\CurlException $info) 
            {
                //$lyrics->Lyric = "Sorry, we didn't found a matching lyric:(";
                //$lyrics->LyricCovertArtUrl = ' ';
            }                                    
        }
        catch (\Guzzle\Http\Exception\BadResponseException $e) 
        {
            //it crashed down...
        }

        //access data from the lastfm api:
        try
        {
            $ServiceUrl = Html::decode('http://ws.audioscrobbler.com/2.0/');
            $client = new Client();
            $request = $client->createRequest('GET', $ServiceUrl);
            
            $query = $request->getQuery();
            $query->set('api_key','2e52ad4ddb8d13a73adc3a21c27be438');
            $query->set('method','artist.getTopTracks');
            $query->set('artist',$model->artist);
            $query->set('limit',10);

            try
            {
                $res = $client->send($request);
                $lastfm = $res->xml();
            }
            catch (\Guzzle\Http\Exception\CurlException $info) 
            {
                //it crashed down...
            }                                    
        }
        catch (\Guzzle\Http\Exception\BadResponseException $e) 
        {
            //it crashed down...
        }

        return $this->render('songview', [
            'model'  => $model,
            'lyrics' => $lyrics,
            'relatedTracks' => $lastfm
        ]);
    }

    /**
     * Creates a new Songs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Songs();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Songs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Songs model.
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
     * Finds the Songs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Songs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Songs::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
