<?php

namespace Morpher\Ws3\Models;

use Morpher\Ws3\Languages\MorpherLanguage;

class DeclensionFunctionExtendedResult
{
    /** @var Declensions|string */
    public $main;

    /** @var Declensions|string */
    public $firstPerson;

    /** @var Declensions|string */
    public $secondPerson;

    /** @var Declensions|string */
    public $secondPersonRespectful;

    /** @var Declensions|string */
    public $thirdPerson;

    /** @var Declensions|string */
    public $firstPersonPlural;

    /** @var Declensions|string */
    public $secondPersonPlural;

    /** @var Declensions|string */
    public $secondPersonRespectfulPlural;

    /** @var Declensions|string */
    public $thirdPersonPlural;

    public static function load(array $data, MorpherLanguage $language): self {
        $model = new self();
        $names = $language->declensionFunctionExtendedResultNames();
        $model->main = Declensions::load($data, $language);
        $model->firstPerson = Declensions::load($data[$names->firstPerson] ?? [], $language);
        $model->secondPerson = Declensions::load($data[$names->secondPerson] ?? [], $language);
        $model->secondPersonRespectful = Declensions::load($data[$names->secondPersonRespectful] ?? [], $language);
        $model->thirdPerson = Declensions::load($data[$names->thirdPerson] ?? [], $language);
        $model->firstPersonPlural = Declensions::load($data[$names->firstPersonPlural] ?? [], $language);
        $model->secondPersonPlural = Declensions::load($data[$names->secondPersonPlural] ?? [], $language);
        $model->secondPersonRespectfulPlural = Declensions::load($data[$names->secondPersonRespectfulPlural] ?? [], $language);
        $model->thirdPersonPlural = Declensions::load($data[$names->thirdPersonPlural] ?? [], $language);
        return $model;
    }
}
