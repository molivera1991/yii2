<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;
use yii\web\UploadedFile;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $name;
    public $last_name;
    public $ci;
    public $email;
    public $pass;
    public $file;
    public $image;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],

            ['name', 'required'],
            ['last_name', 'required'],

            ['ci', 'required'],
            ['ci', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This ci has already been taken.'],

            [['file'], 'file'],
            [['image'], 'string', 'max' => 200],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This mail has already been taken.'],
            ['email', 'string', 'min' => 2, 'max' => 255],

            ['pass', 'required'],
            ['pass', 'string', 'min' => 6],
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
        $user->username = $this->username;
        $user->name = $this->name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        $user->ci = $this->ci;

        // var_dump($this);
        //
        // //subir imagen al file system
        // $user->file = UploadedFile::getInstance($this, 'file');
        //
        // // var_dump($model->file);
        // // die;
        // if(is_null($user->file)){
        //   //si es nulo seteo imagen no tiene imagen.
        //   $user->image = 'uploads/sinimagen.jpg';
        // }else{
        //   //si no es null se adjunto archivo.
        //   $user->file->saveAs('uploads/' . $user->file->baseName . '.' . $user->file->extension);
        //   $user->image = 'uploads/' . $user->file->baseName . '.' . $user->file->extension;
        // }

        $user->generateAuthKey();
        $user->generatePasswordResetToken();
        //Encripta contraseña
        $user->setPassword($this->pass);
        //Asigna rol
        $auth = \Yii:: $app ->authManager;
        $ClienteRole = $auth ->getRole( 'Cliente' );
        $auth ->assign( $ClienteRole , $user->getId());

        return $user->save() ? $user : null;
    }
}
