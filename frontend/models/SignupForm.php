<?php
namespace frontend\models;

use yii\base\Model;
use common\models\Usuario;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $UsuarioNombre;
    public $UsuarioApellido;
    public $UsuarioMail;
    public $UsuarioCI;
    public $UsuarioPass;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['UsuarioMail', 'trim'],
            ['UsuarioMail', 'required'],
            ['UsuarioMail', 'unique', 'targetClass' => '\common\models\Usuario', 'message' => 'This username has already been taken.'],
            ['UsuarioMail', 'string', 'min' => 2, 'max' => 255],

            ['UsuarioPass', 'required'],
            ['UsuarioPass', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return Usuario|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new Usuario();
        $user->UsuarioNombre = $this->UsuarioNombre;
        $user->UsuarioApellido = $this->UsuarioApellido;
        $user->UsuarioMail = $this->UsuarioMail;
        $user->UsuarioCI = $this->UsuarioCI;
        //Encripta contraseña
        $user->setPassword($this->UsuarioPass);
        //Asigna rol
        $auth = \Yii:: $app ->authManager;
        $ClienteRole = $auth ->getRole( 'Cliente' );
        $auth ->assign( $ClienteRole , $user ->getId());

        return $user->save() ? $user : null;
    }
}
