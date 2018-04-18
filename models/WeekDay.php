<?php

namespace app\models;

/**
 * This is the model class for table "test_task_week_day".
 *
 * @property int $id
 * @property string $date
 * @property int $count_calls
 * @property int $employee_id
 * @property int $presence_view
 *
 * @property Employee $employee
 */
class WeekDay extends \yii\db\ActiveRecord
{

    public static $presenceView = [
        1 => 'Presence',
        2 => 'Weekend',
        3 => 'Not work'
    ];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%week_day}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date'], 'required'],
            [['date'], 'safe'],
            [['count_calls', 'employee_id', 'presence_view'], 'integer'],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'count_calls' => 'Count Calls',
            'employee_id' => 'Employee',
            'presence_view' => 'Presence View',
        ];
    }

    /**
     * @return object Employee
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['id' => 'employee_id'])->one();
    }

    public function getPresenceView() {
        return self::$presenceView[$this->presence_view];
    }
}
