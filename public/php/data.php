<?php
    $inputs = [
        'graduate' => [
            'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
            'regex' => REGEX_NO_NUMBER,
            'error' => '',
            'value' => '',
        ],
        'linkedinAccount' => [
            'filter' => FILTER_SANITIZE_URL,
            'regex' => REGEX_URL_LINKEDIN,
            'error' => '',
            'value' => '',
        ],
        'email' => [
            'filter' => FILTER_SANITIZE_EMAIL,
            'regex' => REGEX_EMAIL,
            'error' => '',
            'value' => '',
        ],
        'zipCode' => [
            'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
            'regex' => REGEX_FIVE_NUMBERS,
            'error' => '',
            'value' => '',
        ],
        'birthCountry' => [
            'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
            'regex' => REGEX_NO_NUMBER,
            'error' => '',
            'value' => '',
        ],
        'birthday' => [
            'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
            'regex' => REGEX_BIRTHDAY,
            'error' => '',
            'value' => '',
        ],
        'firstname' => [
            'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
            'regex' => REGEX_NO_NUMBER,
            'error' => '',
            'value' => '',
        ],
        'lastname' => [
            'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
            'regex' => REGEX_NO_NUMBER,
            'error' => '',
            'value' => '',
        ],
    ];
?>