<?php
    $countries = array ("Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua &amp; Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia &amp; Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Cape Verde","Cayman Islands","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cruise Ship","Cuba","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kuwait","Kyrgyz Republic","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Mauritania","Mauritius","Mexico","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Namibia","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","Norway","Oman","Pakistan","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre &amp; Miquelon","Samoa","San Marino","Satellite","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","South Africa","South Korea","Spain","Sri Lanka","St Kitts &amp; Nevis","St Lucia","St Vincent","St. Lucia","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad &amp; Tobago","Tunisia","Turkey","Turkmenistan","Turks &amp; Caicos","Uganda","Ukraine","United Arab Emirates","United Kingdom","Uruguay","Uzbekistan","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe");
    
    include './public/php/regex.php';
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include './public/php/data.php';
        foreach ($inputs as $key => $input) {
            // Nettoyage
            $input['value'] .= trim(filter_input(INPUT_POST, $input['name'], $input['filter']));
            // Validation
            if (empty($input['value'])) {
                $input['error'] .= 'Ce champ est obligatoire';
                $inputs[$key] = $input;
            } else {
                $isOk = filter_var($input['value'], FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/'.$input['regex'].'/')));
                if ($isOk == false) {
                    $input['error'] .= 'La donnée n\'est pas conforme';
                    $inputs[$key] = $input;
                } else {
                    $input['value'] = $isOk;
                    $inputs[$key] = $input;
                }
            }
        }
        var_dump($inputs);
    }
?>

<!DOCTYPE html>
<html lang="fr-Fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./public/assets/icons/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="./public/css/style.css">
    <script defer src="./public/js/script.js"></script>
    <title>Verification formulaire</title>
</head>
<body>
    <main>

        
        <!-- Formulaire -->
        <form novalidate method="post">

            <!-- Titre -->
            <div class="positionRelative">
                <label for="profilPicture">
                    <img src="./public/assets/icons/camera.svg" alt="" srcset="">
                </label>
            </div>
            <input type="file" name="profilPicture" id="profilPicture" hidden>

            <!-- Input nom et prénom -->
            <div class="containerInput">
                <input value="<?= $inputs['lastname']['value'] ?? '' ?>" class="input" type="text" name="lastname" id="lastname" placeholder="Nom" pattern="<?= REGEX_NO_NUMBER ?>"required>
                <p class="error"><?= $inputs['lastname']['error'] ?? '' ?></p>
                <input class="input" type="text" name="firstname" id="firstname" placeholder="Prénom" pattern="<?= REGEX_NO_NUMBER ?>" required>
                <p class="error"><?= $inputs['firstname']['error'] ?? '' ?></p>
            </div>

            <!-- Input date de naissance -->
            <input  value="<?= $inputs['birthday']['value'] ?? '' ?>" class="input" type="date" name="birthday" id="birthday" placeholder="03/02/02" required>

            <!-- Input pays et code postal -->
            <div class="containerInput">
                <select name="birthCountry" id="birthCountry">
                    <?php
                        foreach ($countries as $country) {
                            $selectedOption = $country == 'France' ? 'selected' : '';
                            echo '<option '.$selectedOption.'>'.$country.'</option>';
                        }
                    ?>
                </select>
                <input class="input" type="number" name="zipCode" id="zipCode" placeholder="Code postal" pattern="[0-9]{5,}">
            </div>

            <!-- Input mail -->
            <input class="input" type="email" name="email" id="email" placeholder="exemple@app.com">
            <div class="indicatorPassword hidden">
                <ul>
                    <li class="minLenght">8 caractères minimum</li>
                    <li class="upperLetter">Une lettre majuscule</li>
                    <li class="specialChara">Un caractère spécial</li>
                </ul>
            </div>

            <!-- Input MDP -->
            <input class="input" type="password" name="password" id="password" placeholder="Mot de passe" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$">

            <!-- Input URL LinkedIn -->
            <input class="input" type="url" name="linkedinAccount" id="linkedinAccount" placeholder="URL de compte LinkedIn" pattern="/((([A-Za-z]{3,9}:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)((?:\/[\+~%\/.\w-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[\w]*))?)/">

            <!-- Input niveau d'étude -->
            <select name="graduate" id="graduate" required>
                <option value="0">Sans</option>
                <option value="1" selected>Baccalauréat</option>
                <option value="2">Baccalauréat +2</option>
                <option value="3">Baccalauréat +3</option>
                <option value="4">Baccalauréat +5</option>
                <option value="5">Doctorat</option>
            </select>

            <!-- Input compétence en programmation -->
            <div class="containerSelection">
                <div class="containerCheckbox">
                    <input type="checkbox" name="htmlCss" id="htmlCss"><span>HTML / CSS</span>
                </div>
                <div class="containerCheckbox">
                    <input type="checkbox" name="javascript" id="javascript"><span>Javscript</span> 
                </div>
                <div class="containerCheckbox">
                    <input type="checkbox" name="php" id="php"><span>Php</span>
                </div>
                <div class="containerCheckbox">
                    <input type="checkbox" name="python" id="python"><span>Python</span>
                </div>
            </div>

            <!-- TextArea pour l'expérience -->
            <textarea name="experience" id="experience" placeholder="Racontez-nous une expérience"></textarea>

            <!-- Boutton d'envoie -->
            <button type="submit">Envoyez</button>
        </form>
    </main>
</body>
</html>