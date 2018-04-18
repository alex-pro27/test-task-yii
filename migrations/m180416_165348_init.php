<?php

use yii\db\Migration;

/**
 * Class m180416_165348_init
 */
class m180416_165348_init extends Migration
{
    /**
     * {@inheritdoc}
     */

    private $employeeTableName = '{{%employee}}';
    private $weekDayTableName = '{{%week_day}}';
    private $indexEmployeeId = 'idx-employee_id';
    private $foreignKeyEmployeeId = 'fk-employee_id';

    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180416_165348_init cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions = 'ENGINE=InnoDB';

        // Table for employee
        $this->createTable(
            $this->employeeTableName,
            [
                'id' => $this->primaryKey(11),
                'name' => $this->string(255)->notNull(),
                'surname' => $this->string(255)->notNull(),
                'salary' => $this->float()->notNull(),
            ],
            $tableOptions
        );

        // Table calls employee
        $this->createTable(
            $this->weekDayTableName,
            [
                'id' => $this->primaryKey(11),
                'date' => $this->date()->notNull(),
                'count_calls' => $this->integer(11),
                'employee_id' => $this->integer(11),
                'presence_view' => $this->integer(2)
            ], $tableOptions
        );

        // Created Index employee_id
        $this->createIndex(
            $this->indexEmployeeId,
            $this->weekDayTableName,
            'employee_id'
        );

        // Added foreign key for employee_id
        $this->addForeignKey(
            $this->foreignKeyEmployeeId,
            $this->weekDayTableName,
            'employee_id',
            $this->employeeTableName,
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropTable($this->employeeTableName);

        $this->dropIndex(
            $this->indexEmployeeId,
            $this->weekDayTableName
        );
        $this->dropForeignKey(
            $this->foreignKeyEmployeeId,
            $this->weekDayTableName
        );

        $this->dropTable($this->callEmployeeTableName);

        return false;
    }
}
