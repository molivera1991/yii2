<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `usuario`.
 */
class m171021_222710_drop_usuario_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropTable('usuario');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->createTable('usuario', [
            'id' => $this->primaryKey(),
            'title' => $this->string(12)->notNull()->unique(),
            'body' => $this->text(),
        ]);
    }
}
