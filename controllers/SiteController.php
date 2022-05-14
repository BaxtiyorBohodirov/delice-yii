<?php

namespace app\controllers;

use app\models\About;
use app\models\Carousel;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Contacts;
use app\models\ContactsForm;
use app\models\News;
use app\models\OurMission;
use app\models\ProductDetails;
use app\models\ProductImages;
use app\models\Products;
use app\models\ProductsCatalog;
use app\models\Reviews;
use yii\data\Sort;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout="main1";
        $model=$this->published(Products::find())->andWhere(['id'=>1])->one();
        $productsModel=$this->published(Products::find())->orderBy('order')->all();
        $ourMissionModel=OurMission::find()->andWhere(['id'=>2])->one();
        $productsCatalog=$this->published(ProductsCatalog::find())->orderBy('order')->all();
        $products=$this->published(Products::find())->andWhere(['ponGallery'=>0])->orderBy('order')->all();
        $productsGallery=$this->published(Products::find())->andWhere(['ponGallery'=>1])->orderBy('order')->all();
        $news=$this->published(News::find())->orderBy('order')->all();
        $reviews=Reviews::find()->all();
        return $this->render('index',
        [
            'model'=>$model,
            'ProductsModel'=>$productsModel,
            'ourMissionModel'=>$ourMissionModel,
            'productsCatalog'=>$productsCatalog,
            'products'=>$products,
            'productsGallery'=>$productsGallery,
            'news'=>$news,
            'reviews'=>$reviews
        ]);
    }
    public function actionAboutUs()
    {
        $ourMissionModel=OurMission::find()->andWhere(['id'=>2])->one();
        $about=About::find()->andWhere(['id'=>1])->one();
        $reviews=Reviews::find()->all();
        return $this->render('about-us',['model'=>$ourMissionModel,'ourMissionModel'=>$about,'reviews'=>$reviews]);
    }
    public function actionCard($product_id=1)
    {
        $productImages=ProductImages::find()->andWhere(['product_id'=>$product_id,'forPage'=>1])->all();
        $productDetails=$this->published(ProductDetails::find())->andWhere(['product_id'=>$product_id])->orderBy('order')->all();
        $sameProducts=$this->published(Products::find())->andWhere(['catalog_id'=>$productImages[0]->product->catalog_id])->all();
        return $this->render('card',['productImages'=>$productImages,'productDetails'=>$productDetails,'sameProducts'=>$sameProducts]);
    }
    public function actionCart()
    {
        return $this->render('cart');
    }
    public function actionCatalog()
    {
        $products=$this->published(Products::find())->andWhere(['ponGallery'=>0])->orderBy('order')->all();
        $productsCatalog=$this->published(ProductsCatalog::find())->orderBy('order')->all();
        return $this->render('catalog',['products'=>$products,'productsCatalog'=>$productsCatalog]);
    }
    public function actionContacts()
    {
        $contact=Contacts::find()->one();
        return $this->render('contacts',['contact'=>$contact]);
    }
    public function actionGallery($product_id=1)
    {
        $productImages=ProductImages::find()->andWhere(['product_id'=>$product_id,'forPage'=>0])->all();
        $product=$productImages[0]->product;
        // $productDetails=$this->published(ProductDetails::find())->andWhere(['product_id'=>$product_id])->orderBy('order')->one();
        return $this->render('gallery',['productImages'=>$productImages,'product'=>$product]);
    }
    public function actionNewsIn()
    {
        $news=$this->published(News::find())->orderBy(['updated_at'=>SORT_DESC])->one();
       if($news) $news=$this->published(News::find())->orderBy(['created_at'=>SORT_DESC])->one();

        return $this->render('news-in',['news'=>$news]);
    }
    public function actionNews()
    {
        $news=$this->published(News::find())->orderBy('order')->all();

        return $this->render('news',['news'=>$news]);
    }
    public function actionOrder()
    {
        return $this->render('order');
    }
    public function actionSearchResults()
    {
        return $this->render('search-results');
    }
    public function published($model1)
    {
        return $model1->andWhere(['status'=>1]);
    }
    public function actionSearchResult()
    {   
        $keyword=$_POST['keyword'];
        if($keyword)
        {
            $keyword=$_POST['keyword'];
            $products=$this->published(Products::find())->andWhere(['ponGallery'=>0])
            ->orderBy('order')->andFilterWhere(['or',['like','title_uz',$keyword],['like','sub_content_uz',$keyword]])-> all();
           
        }
        else{
            $products=$this->published(Products::find())->andWhere(['ponGallery'=>0])->orderBy('order')->all();
        }
        return $this->render('search-results',['products'=>$products,'keyword'=>$keyword]);
    }
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionCreateContactsForm()
    {
        $model=new ContactsForm();
        if($this->request->isPost)
        {
            print_r($_POST);
            // if($model->load(Yii::$app->request->post(),''))
            // {
            //     if($model->save())
            //     {
            //         return $this->renderAjax('_item');
            //     }
            // }    
        }
    }   
    public function actionGetProducts($id)
    {
        Yii::$app->response->format=yii\web\Response::FORMAT_JSON;
        if($id!=1)
        {
            $products=$this->published(Products::find())->andWhere(['ponGallery'=>0])->orderBy('order')->andWhere(['catalog_id'=>$id])->all();
        }
        else
        {
            $products=$this->published(Products::find())->andWhere(['ponGallery'=>0])->orderBy('order')->all();
        }
        foreach($products as $item){
            $item->image=Carousel::getImageLink($item->image);
        }
        return ['data'=>$products];
    }
    public function actionGetProductDetail($id)
    {
        $productDetail=ProductDetails::find()->andWhere(['id'=>$id])->one();
        return $productDetail->content_uz?$productDetail->content_uz:"No details!";
    }
}
