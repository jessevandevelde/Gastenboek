    <?php

// hier komt je code


// haal json data op
$jsonData = file_get_contents("berichten.json");


// zet het om naar een associative array
$data = json_decode($jsonData, true);
// lege html string
$htmlString = '';

foreach($data as $message)
{
    $htmlString .= "
    <div class='bericht'>
    <label for='nawam'>${message['name']}</label>
    <label for='bericht'>${message['message']}</label>
    </div>
    ";
};