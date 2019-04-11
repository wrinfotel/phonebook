<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%phonebook}}`.
 */
class m190410_153121_create_phonebook_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%phonebook}}', [
            'id' => $this->primaryKey(),
	        'name' => $this->string(100),
	        'surname' => $this->string(100),
	        'patronymic' => $this->string(100),
	        'mobile' => $this->string(12),
	        'home' => $this->string(12),
	        'email' => $this->string(100),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%phonebook}}');
    }
}
