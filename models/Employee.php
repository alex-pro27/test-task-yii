<?php

namespace app\models;

/**
 * This is the model class for table "test_task_employee".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property double $salary
 *
 * @property WeekDay[] $weekDays
 */
class Employee extends \yii\db\ActiveRecord
{

    public $bonus;
    public $sumCalls;
    public $fullSalary;

    public static $bonusTypes = [
        'START' => ['step' => 100, 'bonus' => 100, 'desk' => 'Begin'],
        'MIDDLE' => ['step' => 200, 'bonus' => 200, 'desk' => 'Middle'],
        'HIGH' => ['step' => 300, 'bonus' => 300, 'desk' => 'High'],
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%employee}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'salary'], 'required'],
            [['salary'], 'number'],
            [['name', 'surname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'salary' => 'Salary',
        ];
    }

    public function getFullName() {
        return $this->name . ' ' . $this->surname;
    }

    public function extraFields()
    {
        return [
            'fullName' => $this->fullName
        ];
    }

    /**
     * Get all week days for the period
     * @param $begin object DateTime or date string
     * @param $end object DateTime or date string
     * @return '\yii\db\ActiveQuery WeekDay
     */
    public function getWeekDays($month)
    {
        $begin = new \DateTime($month);
        $end = clone $begin;
        $end->modify('+1 month');
        $days = $this->hasMany(WeekDay::className(), ['employee_id' => 'id'])
                     ->where(['>=', 'date', $begin->format('Y-m-d')])
                     ->andWhere(['<', 'date', $end->format('Y-m-d')])
                     ->all();
        $this->calculateSalary($days);
        return $days;
    }

    /**
     * Calculate $fullSalary, $bonus, $sumCall
     * @param $days \yii\db\ActiveQuery weekDay
     */
    public function calculateSalary($days)
    {
        if ($days) {
            $this->sumCalls = array_reduce($days, function ($sum, $day) { return $sum + $day->count_calls; }, 0);
            $this->bonus = $this->getBonus();
            $this->fullSalary = $this->bonus['bonus'] * $this->sumCalls + $this->salary;
        }
    }

    private function getBonus()
    {
        foreach (array_reverse(self::$bonusTypes) as $item) {
            if ($this->sumCalls >= $item['step']) {
                return $item;
            }
        }
    }
}
