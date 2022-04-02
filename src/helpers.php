<?php

function string_is_white_space(string $value): bool {
    return preg_match('/^\s+$/', $value) > 0;
}

function string_is_not_empty_or_white_space($value): bool {
    return !empty($value) && is_string($value) && !string_is_white_space($value);
}

function require_non_empty_string($value, string $paramName): string {
    $value = trim($value);

    if (!string_is_not_empty_or_white_space($value)) {
        throw new \InvalidArgumentException("$paramName is empty");
    }

    return $value;
}
