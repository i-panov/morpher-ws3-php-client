<?php

namespace Morpher\Ws3\Models;

class Genders
{
    /**
     * женский род
     *
     * @var string
     */
    public $feminine;

    /**
     * средний род
     *
     * @var string
     */
    public $neuter;

    /**
     * множественное число
     *
     * @var string
     */
    public $plural;

    public function __construct(array $data) {
        $this->feminine = $data['feminine'] ?? '';
        $this->neuter = $data['neuter'] ?? '';
        $this->plural = $data['plural'] ?? '';
    }
}
