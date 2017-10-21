<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $UsuarioId
 * @property string $UsuarioNombre
 * @property string $UsuarioApellido
 * @property string $UsuarioCI
 * @property string $UsuarioMail
 *
 * @property Comercio[] $comercios
 * @property Envio[] $envios
 * @property Pedido[] $pedidos
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UsuarioNombre', 'UsuarioApellido', 'UsuarioCI', 'UsuarioMail'], 'required'],
            [['UsuarioNombre', 'UsuarioApellido', 'UsuarioMail'], 'string', 'max' => 45],
            [['UsuarioCI'], 'string', 'max' => 8],
            [['UsuarioCI'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'UsuarioId' => 'Usuario ID',
            'UsuarioNombre' => 'Usuario Nombre',
            'UsuarioApellido' => 'Usuario Apellido',
            'UsuarioCI' => 'Usuario Ci',
            'UsuarioMail' => 'Usuario Mail',
        ];
    }


   public static function findIdentity($id)
   {
       return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
   }

   /**
    * @inheritdoc
    */
   public static function findIdentityByAccessToken($token, $type = null)
   {
       throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
   }

   /**
    * Finds user by username
    *
    * @param string $username
    * @return static|null
    */
   public static function findByUsername($username)
   {
       return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
   }

   /**
    * Finds user by password reset token
    *
    * @param string $token password reset token
    * @return static|null
    */
   public static function findByPasswordResetToken($token)
   {
       if (!static::isPasswordResetTokenValid($token)) {
           return null;
       }

       return static::findOne([
           'password_reset_token' => $token,
           'status' => self::STATUS_ACTIVE,
       ]);
   }

   /**
    * Finds out if password reset token is valid
    *
    * @param string $token password reset token
    * @return bool
    */
   public static function isPasswordResetTokenValid($token)
   {
       if (empty($token)) {
           return false;
       }

       $timestamp = (int) substr($token, strrpos($token, '_') + 1);
       $expire = Yii::$app->params['user.passwordResetTokenExpire'];
       return $timestamp + $expire >= time();
   }

   /**
    * @inheritdoc
    */
   public function getId()
   {
       return $this->getPrimaryKey();
   }

   /**
    * @inheritdoc
    */
   public function getAuthKey()
   {
       return $this->auth_key;
   }

   /**
    * @inheritdoc
    */
   public function validateAuthKey($authKey)
   {
       return $this->getAuthKey() === $authKey;
   }

   /**
    * Validates password
    *
    * @param string $password password to validate
    * @return bool if password provided is valid for current user
    */
   public function validatePassword($password)
   {
       return Yii::$app->security->validatePassword($password, $this->password_hash);
   }

   /**
    * Generates password hash from password and sets it to the model
    *
    * @param string $password
    */
   public function setPassword($password)
   {
       $this->password_hash = Yii::$app->security->generatePasswordHash($password);
   }

   /**
    * Generates "remember me" authentication key
    */
   public function generateAuthKey()
   {
       $this->auth_key = Yii::$app->security->generateRandomString();
   }

   /**
    * Generates new password reset token
    */
   public function generatePasswordResetToken()
   {
       $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
   }

   /**
    * Removes password reset token
    */
   public function removePasswordResetToken()
   {
       $this->password_reset_token = null;
   }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComercios()
    {
        return $this->hasMany(Comercio::className(), ['ComercioGerente' => 'UsuarioId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnvios()
    {
        return $this->hasMany(Envio::className(), ['UsuarioDespachador' => 'UsuarioId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['PedidoCliente' => 'UsuarioId']);
    }
}
