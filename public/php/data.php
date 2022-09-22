<?php
    $inputs = [
        'graduate' => [
            'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
            'regex' => REGEX_NO_NUMBER,
            'error' => '',
            'value' => '',
            'required' => false,
        ],
        'linkedinAccount' => [
            'filter' => FILTER_SANITIZE_URL,
            'regex' => REGEX_URL_LINKEDIN,
            'error' => '',
            'value' => '',
            'required' => false,
        ],
        'email' => [
            'filter' => FILTER_SANITIZE_EMAIL,
            'regex' => REGEX_EMAIL,
            'error' => '',
            'value' => '',
            'required' => true,
        ],
        'zipCode' => [
            'filter' => FILTER_SANITIZE_NUMBER_INT,
            'regex' => REGEX_FIVE_NUMBERS,
            'error' => '',
            'value' => '',
            'required' => true,
        ],
        'birthCountry' => [
            'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
            'regex' => REGEX_NO_NUMBER,
            'error' => '',
            'value' => '',
            'required' => true,
        ],
        'birthday' => [
            'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
            'regex' => REGEX_BIRTHDAY,
            'error' => '',
            'value' => '',
            'required' => true,
        ],
        'firstname' => [
            'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
            'regex' => REGEX_NO_NUMBER,
            'error' => '',
            'value' => '',
            'required' => true,
        ],
        'lastname' => [
            'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
            'regex' => REGEX_NO_NUMBER,
            'error' => '',
            'value' => '',
            'required' => true,
        ],
    ];
?>