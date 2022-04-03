<?php

namespace Morpher\Ws3\Models;

use Morpher\Ws3\Languages\MorpherLanguage;

class DeclensionFunctionResult
{
    /**
     * Основные падежи
     *
     * @var Declensions
     */
    public $main;

    /**
     * Падежи во множественном числе
     *
     * @var Declensions|null
     */
    public $plural;

    /**
     * Где
     *
     * @var string
     */
    public $whereIs;

    /**
     * Куда
     *
     * @var string
     */
    public $whereTo;

    /**
     * Откуда
     *
     * @var string
     */
    public $whereFrom;

    /**
     * Род
     *
     * @var string
     */
    public $gender;

    /**
     * ФИО
     *
     * @var FullName
     */
    public $fullName;

    public function __construct(array $data, MorpherLanguage $language) {
        $this->main = Declensions::load($data, $language);

        if (!empty($data['множественное']) && is_array($data['множественное'])) {
            $this->plural = Declensions::load($data['множественное'], $language);
        }

        $this->whereIs = $data['где'] ?? '';
        $this->whereTo = $data['куда'] ?? '';
        $this->whereFrom = $data['откуда'] ?? '';

        if ($gender = $language->getGender()) {
            if (!empty($data[$gender])) {
                $this->gender = $data[$gender];
            }
        }

        if (!empty($data['ФИО']) && is_array($data['ФИО'])) {
            $this->fullName = new FullName($data['ФИО']);
        }
    }
}
