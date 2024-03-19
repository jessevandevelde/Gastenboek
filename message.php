
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="send-message">
    <div class="sendMessage">
    <button id="create-message">
        <a href="index.php">voeg een bericht toe</a>
    </button>
    </div>
</div>
    <div class="berichten-container">
       
        
       <?php 
        $jsonData = file_get_contents("berichten.json");


        // zet het om naar een associative array
        $data = json_decode($jsonData, true);
        // lege html string
        $htmlString = '';
        
        foreach($data as $message)
        {
            // Convert Unix timestamp to DateTime object
        $dateTime = new DateTime("@{$message['timestamp']}");
    
        // Set the desired timezone (GMT+1)
        $dateTime->setTimezone(new DateTimeZone('Europe/Amsterdam'));
    
        // Format the date in a readable format
        $formattedDate = $dateTime->format('d-m-Y H:i');

        $photoHtml = isset($message['foto']) ? "<img src='uploads/{$message['foto']}' onerror='this.style.display=\"none\"'>" : "";

            $htmlString .= "
            
            <section>
                <H1>{$message['naam']}</H1>
                <h2>{$message['bericht']}</h2>
                {$photoHtml}
                <h3>{$formattedDate}</h3>
            </section>
            
            ";
        };
        // bovenste gedeelte is shorthand voor dit
        echo $htmlString
        ?> 
    </div>

</body>
</html>