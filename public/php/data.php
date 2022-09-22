<?php
    $inputs = [
        'birthday' => [
            'name' => 'birthday',
            'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
            'regex' => REGEX_BIRTHDAY,
            'error' => '',
            'value' => '',
        ],
        'firstname' => [
            'name' => 'firstname',
            'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
            'regex' => REGEX_NO_NUMBER,
            'error' => '',
            'value' => '',
        ],
        'lastname' => [
            'name' => 'lastname',
            'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
            'regex' => REGEX_NO_NUMBER,
            'error' => '',
            'value' => '',
        ],
    ];
?>