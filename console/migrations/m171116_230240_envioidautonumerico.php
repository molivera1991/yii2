<?php

use yii\db\Migration;

class m171116_230240_envioidautonumerico extends Migration
{
    public function safeUp()
    {
      $this->execute("alter table pedido drop foreign key fk_Pedido_Envio1");
      $this->execute("ALTER TABLE `envio` MODIFY COLUMN `EnvioId` INT(11) NOT NULL AUTO_INCREMENT");
      $this->execute("ALTER TABLE `pedido` ADD CONSTRAINT `fk_Pedido_Envio1` FOREIGN KEY (`PedidoEnvio`) REFERENCES `envio` (`EnvioId`) ON DELETE NO ACTION ON UPDATE NO ACTION");
    }

    public function safeDown()
    {
        echo "m171116_230240_envioidautonumerico cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171116_230240_envioidautonumerico cannot be reverted.\n";

        return false;
    }
    */
}
