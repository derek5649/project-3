<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Gaming Notes</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/style.css">

        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script>window.html5 || document.write('<script src="js/vendor/html5shiv.js"><\/script>')</script>
        <![endif]-->
    </head>
    <body>
   
<section class="note-book">
    
<?php

$servername = getenv('introwebdevelopment-dhall68.c9user.io');
$username = 'dhall68';
$password = "";
$database = "c9";
$dbport = "3306";
$dbname = "notebook";    
    
$db = new mysqli($servername, $username, $password, $database, $dbport);

if ($db->connect_error) {
    die("Connection Failed: " . $db->connect_error);
}

echo("Connected Successfully: " . $db->host_info);

mysqli_select_db($db, $dbname);

if (empty($result)) {
    $sql = "CREATE TABLE NoteBook (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(20) NOT NULL, 
        body VARCHAR(200) NOT NULL
        )";

if ($db->query($sql) == TRUE) {
    print_r("<br>Table NoteBook was created successfully");
} else {
    print_r("<br>ok: " . $db->error);
}



}
    
$note_insert = "INSERT INTO NoteBook (title, body) VALUES ('$title', '$body')";

if (mysqli_query($db, $note_insert)) {
    print_r("<br>Note added successfully.");
} else { 
    print_r("<br>Error: " .mysqli_error($db));
}

print_r("<h1>Note Results Are</h1>");

$sql = "SELECT id, title, body";
$noteresult = $db->query($sql);

if ($noteresult->num_rows > 0) {
    
    while ($row = $noteresult->fetch_assoc()) {
        echo "Guest ID: " . $row["id"] . "<br> Current Notes " .
        $row["title"] . " " . $row["body"] . "<br><br>";
    }
} else {
    print_r("<br>No results to display.");
}

$db->close();

?>


<a href="../index.html">Return to Notebook</a>
    
</section>    
    




            


     
    <script src="js/main.js"></script>
    </body>
</html>
