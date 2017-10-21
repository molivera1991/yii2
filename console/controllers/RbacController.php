<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $cliente = $auth->createRole('Cliente');
        $auth->add($cliente);

        $administrador = $auth->createRole('Administrador');
        $auth->add($administrador);

        $gerente = $auth->createRole('Gerente');
        $auth->add($gerente);

        $despachador = $auth->createRole('Despachador');
        $auth->add($despachador);
    }
}
