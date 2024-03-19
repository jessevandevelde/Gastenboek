<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Gastenboek</h1>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="text" name="naam" id="naam">
        <textarea name="bericht" id="bericht" cols="30" rows="10"></textarea>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>
</html>