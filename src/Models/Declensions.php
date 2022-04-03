<?php

namespace Morpher\Ws3\Models;

use Morpher\Ws3\Languages\MorpherLanguage;

/**
 * Падежи
 */
class Declensions
{
    /**
     * Именительный
     *
     * @var string
     */
    public $nominative;

    /**
     * Родительный
     *
     * @var string
     */
    public $genitive;

    /**
     * Дательный
     *
     * @var string
     */
    public $dative;

    /**
     * Винительный
     *
     * @var string
     */
    public $accusative;

    /**
     * Творительный
     *
     * @var string
     */
    public $instrumental;

    /**
     * Предложный
     *
     * @var string
     */
    public $prepositional;

    /**
     * Предложный О
     *
     * @var string
     */
    public $prepositionalO;

    public static function load(array $data, MorpherLanguage $language): self {
        $model = new self();
        $names = $language->declensionNames();
        $model->nominative = $data[$names->nominative] ?? '';
        $model->genitive = $data[$names->genitive] ?? '';
        $model->dative = $data[$names->dative] ?? '';
        $model->accusative = $data[$names->accusative] ?? '';
        $model->instrumental = $data[$names->instrumental] ?? '';
        $model->prepositional = $data[$names->prepositional] ?? '';
        $model->prepositionalO = $data[$names->prepositionalO] ?? '';
        return $model;
    }
}
