<?php

namespace Morpher\Ws3\Models;

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

    public function __construct(array $data) {
        $this->nominative = $data['И'] ?? '';
        $this->genitive = $data['Р'] ?? '';
        $this->dative = $data['Д'] ?? '';
        $this->accusative = $data['В'] ?? '';
        $this->instrumental = $data['Т'] ?? '';
        $this->prepositional = $data['П'] ?? '';
        $this->prepositionalO = $data['П_о'] ?? '';
    }
}
