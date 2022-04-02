<?php

namespace Morpher\Ws3\Models;

class FullName
{
    /**
     * Имя
     *
     * @var string
     */
    public $name;

    /**
     * Фамилия
     *
     * @var string
     */
    public $surname;

    /**
     * Отчество
     *
     * @var string
     */
    public $patronymic;

    public function __construct(array $data) {
        $this->name = $data['И'] ?? '';
        $this->surname = $data['Ф'] ?? '';
        $this->patronymic = $data['О'] ?? '';
    }
}
