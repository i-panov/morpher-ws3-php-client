<?php

namespace Morpher\Ws3\Models;

final class DeclensionFunctionFlags
{
    /** Женский род */
    public const FEMININE = 'feminine';

    /** Мужской род */
    public const MASCULINE = 'masculine';

    /** Средний род */
    public const NEUTER = 'neuter';

    /** Одушевлённое */
    public const ANIMATE = 'animate';

    /** Неодушевлённое */
    public const INANIMATE = 'inanimate';

    /** Нарицательное */
    public const COMMON = 'common';

    /** ФИО */
    public const NAME = 'name';
}
