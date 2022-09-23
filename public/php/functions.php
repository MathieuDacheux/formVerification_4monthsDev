<?php
    function validationdInput($input) {
        if (empty($input['value']) && $input['required'] == true) {
            $input['error'] = 'Ce champ est obligatoire';
        } else if (!empty($input['value'])) {
            $isOk = filter_var($input['value'], FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/'.$input['regex'].'/')));
            if (!$isOk) {
                $input['error'] = 'La donnée n\'est pas conforme';
            } else {
                $input['value'] = $isOk;
            }
        }
        return $input;
    };
 
    function validationFromArray($input, $array) {
        if (empty($input['value']) && $input['required'] == true) {
            $input['error'] = 'Ce champ est obligatoire';
        } else {
            $isOk = filter_var($input['value'], FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/'.$input['regex'].'/')));
            if (in_array($isOk, $array) == false) {
                $input['error'] = 'La donnée n\'est pas conforme';
            } else {
                $input['value'] = $isOk;
            }
        }
        return $input;
    };

