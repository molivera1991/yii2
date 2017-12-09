<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {

        $auth = Yii::$app->authManager;

        // Ya esta en la base:
/*
        $cliente = $auth->createRole('Cliente');
        //$auth->add($cliente);
        $login_front = $auth->createPermission('loginFront');
        $login_front->description = 'Login in front';
        $auth->add($login_front);

        $auth->addChild($cliente, $login_front);
        $administrador = $auth->createRole('Administrador');
        $auth->add($administrador);

        $gerente = $auth->createRole('Gerente');
        $auth->add($gerente);

        $despachador = $auth->createRole('Despachador');
        $auth->add($despachador);
        */
    }
}
