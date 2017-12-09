<?php

use yii\db\Migration;

/**
 * Handles adding image to table `user`.
 */
class m171028_212217_add_image_column_to_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('user', 'image', $this->string(200));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('user', 'image');
    }
}
