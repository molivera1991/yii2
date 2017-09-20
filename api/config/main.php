<?php

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => ['log', 'docGenerator'],
    'modules' => [

        'v1' => [
            'basePath' => '@app/modules/v1',
            'class' => 'api\modules\v1\Module'
        ]
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableSession' => false,
            //'loginUrl' => null,
        ],
        'response' => [
            'format' => yii\web\Response::FORMAT_JSON,
            'charset' => 'UTF-8',

            //molivera: agregue $response = $event->sender; para que no falle
            'on beforeSend' => function ($event) {
               $response = $event->sender;
              if ($response->data !== null) {
                  $response->data = [
                      'success' => $response->isSuccessful,
                      'code' => $response->statusCode,
                      'status' => $response->statusText,
                      'data' => $response->data,
                  ];
                  // $response->statusCode = 200;
              }
            },
            'on afterSend' => function ($event) {
                $response = $event->sender;
                if ($response->data !== null) {
                    if(Yii::$app->docGenerator->isActive){
                        $apiDocGenerator = new eold\apidocgen\src\ApiDocGenerator;
                        $apiDocGenerator->init();
                        // $apiDocGenerator->generateDocs($event);
                    }
                }
            },
        ],

        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],

        'docGenerator' =>[
            'class' => 'eold\apidocgen\src\ApiDocGenerator',
            'isActive'=>true,                      // Flag to set plugin active
            'versionRegexFind'=>'/(\w+)(\d+)/i',   // regex used in preg_replace function to find Yii api version format (usually 'v1', 'vX') ...
            'versionRegexReplace'=>'${2}.0.0',     // .. and replace it in Apidoc format (usually 'x.x.x')
            'docDataAlias'=>'@runtime/documentation'   // Folder to save output. make sure is writable.
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            // 'rules' => [
            //         // CRUD Controllers
            //         'HEAD <apiv:v\d+>/<controller:\w+>'              => '<apiv>/<controller>/index',
            //         'GET <apiv:v\d+>/<controller:\w+>'               => '<apiv>/<controller>/index',
            //         'HEAD <apiv:v\d+>/<controller:\w+>/<id:(\d)+>'   => '<apiv>/<controller>/view',
            //         'GET <apiv:v\d+>/<controller:\w+>/<id:(\d)+>'    => '<apiv>/<controller>/view',
            //         'POST <apiv:v\d+>/<controller:\w+>'              => '<apiv>/<controller>/create',
            //         'PUT <apiv:v\d+>/<controller:\w+>/<id:(\d)+>'    => '<apiv>/<controller>/update',
            //         'PATCH <apiv:v\d+>/<controller:\w+>/<id:(\d)+>'  => '<apiv>/<controller>/update',
            //         'DELETE <apiv:v\d+>/<controller:\w+>/<id:(\d)+>' => '<apiv>/<controller>/delete',

            //         //Reglas genericas para otras Actions
            //         'GET <apiv:v\d+>/<controller:\w+>/<action:\w+>' => '<apiv>/<controller>/<action>',
            //         'POST <apiv:v\d+>/<controller:\w+>/<action:\w+>' => '<apiv>/<controller>/<action>',

            // ],

           'rules' => [
                ['class' => 'yii\rest\UrlRule', 'controller' => 'v1/country'],
            ],


        ],
    ],
    'params' => $params,
];
