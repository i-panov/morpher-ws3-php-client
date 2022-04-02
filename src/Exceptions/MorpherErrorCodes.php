<?php

namespace Morpher\Ws3\Exceptions;

final class MorpherErrorCodes
{
    /** Превышен лимит на количество запросов в сутки. Перейдите на следующий тарифный план. */
    public const DAILY_LIMIT_EXCEEDED = 1;

    /** IP заблокирован. */
    public const IP_BLOCKED = 3;

    /** Данный токен не найден. */
    public const TOKEN_NOT_FOUND = 9;

    /** Неверный формат токена. */
    public const INVALID_TOKEN_FORMAT = 10;

    /** Ошибка сервера. */
    public const SERVER_ERROR = 11;
}
