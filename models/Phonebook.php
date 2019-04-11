<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "phonebook".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property string $mobile
 * @property string $home
 * @property string $email
 */
class Phonebook extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'phonebook';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname'], 'required', 'message' => 'Поле обязательно к заполнению'],
            [['name', 'surname', 'patronymic', 'email'], 'string', 'max' => 100],
            [['mobile', 'home'], 'string', 'max' => 12],
	        ['mobile', 'match', 'pattern' => '/^\+[0-9]{11}$/', 'message' => 'Неверный формат данных' ],
	        ['home', 'match', 'pattern' => '/^\+[0-9]{11}$/', 'message' => 'Неверный формат данных' ],
	        [['email'], 'email', 'message' => 'Неверный формат данных'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'mobile' => 'Мобильный телефон',
            'home' => 'Домашний телефон',
            'email' => 'E-mail',
        ];
    }
}
