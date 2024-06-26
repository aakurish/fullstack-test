<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentsModel extends Model
{
    protected $table            = 'comments';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['name', 'text','date'];

    protected $validationRules = [
        'name'          => 'required|valid_email',
        'text'          => 'required|min_length[1]',
        'date'          => 'required|valid_date'
    ];

    protected $validationMessages = [
        'email' => [
            'required' => 'Не указано поле "емейл"',
            'valid_email' => 'Некорректный емейл',
        ],
        'text' => [
            'required' => 'Поле текст обязательно'
        ],
        'date' => [
            'required' => 'Поле дата обязательно',
            'valid_date' => 'Укажите корректную дату'
        ],

    ];
}
