<?php
namespace frontend\models;

use yii\base\Model;
use common\models\user;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $UsuarioNick;
    public $UsuarioNombre;
    public $UsuarioApellido;
    public $UsuarioCI;
    public $UsuarioMail;
    public $UsuarioPass;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['UsuarioNick', 'required'],
            ['UsuarioNombre', 'required'],
            ['UsuarioApellido', 'required'],
            ['UsuarioCI', 'required'],

            ['UsuarioMail', 'trim'],
            ['UsuarioMail', 'required'],
            ['UsuarioMail', 'unique', 'targetClass' => '\common\models\Usuario', 'message' => 'This mail has already been taken.'],
            ['UsuarioMail', 'string', 'min' => 2, 'max' => 255],

            ['UsuarioPass', 'required'],
            ['UsuarioPass', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return user|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new user();
        //Toma la proxima id
        $user->id = user::find()->max('id') + 1;
        $user->username = $this->UsuarioNick;
        $user->name = $this->UsuarioNombre;
        $user->last_name = $this->UsuarioApellido;
        $user->email = $this->UsuarioMail;
        $user->ci = $this->UsuarioCI;
        $user->generateAuthKey();
        $user->generatePasswordResetToken();
        //Encripta contraseña
        $user->setPassword($this->UsuarioPass);
        //Asigna rol
        $auth = \Yii:: $app ->authManager;
        $ClienteRole = $auth ->getRole( 'Cliente' );
        $auth ->assign( $ClienteRole , $user->getId());

        return $user->save() ? $user : null;
    }
}
