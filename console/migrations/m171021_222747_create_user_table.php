<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m171021_222747_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `name` varchar(45) NOT NULL,
              `last_name` varchar(45) NOT NULL,
              `ci` char(8) NOT NULL,
              `username` varchar(255) NOT NULL,
              `auth_key` varchar(32) NOT NULL,
              `password_hash` varchar(255) NOT NULL,
              `password_reset_token` varchar(255) NOT NULL,
              `email` varchar(100) NOT NULL,
              `status` smallint(10) NOT NULL,
              `created_at` int(11) NOT NULL,
              `updated_at` int(11) NOT NULL,
              PRIMARY KEY (`id`)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
