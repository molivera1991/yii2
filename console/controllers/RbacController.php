
<?php
namespace app\commands;

use Yii;
use yii\console\controllers;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $cliente = $auth->createRole('Cliente');

    }
}
?>
