<?php

use yii\db\Migration;

/**
 * Handles adding role to table `user`.
 */
class m171209_210621_add_role_column_to_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('user', 'position', $this->string(20));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('user', 'position');
    }
}
