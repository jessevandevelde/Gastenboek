<?php

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

// je haalt alle data uit berichten.json op en slaat het op in een variabele
$json_data = file_get_contents("berichten.json");

// hier zetten we tekst (json) om naar een associative array
$data = json_decode($json_data, true);



if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $json_data = file_get_contents("berichten.json");

    // omzetten naar associative array
    $data = json_decode($json_data, true);
    
    $naam = $_POST["naam"];
    $bericht = $_POST["bericht"];
 

    $data[] = [
        "naam" => $naam,
        "bericht" => $bericht,
        "foto" => $_FILES["fileToUpload"]["name"],
        "timestamp" => time()
    ];
    $jsonData = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents("berichten.json", $jsonData);
}
header('Location: message.php');


// alert(JSON.stringify(new_messages$new_messages))

?>
