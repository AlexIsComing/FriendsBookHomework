<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>FriendsBook</title>

    <style>
        /* Style the header */
        header {
            background-color: #666;
            padding: 30px;
            text-align: center;
            font-size: 35px;
            color: white;
        }
        /* Style the footer */
        footer {
            background-color: #777;
            padding: 10px;
            text-align: center;
            color: white;
        }
    </style>
</head>
<body>

<header>
    <h1>Friend book</h1>
</header>
<br />

<form action="index.php" method="post">
    Name: <input type="text" name="name">
    <input type="submit" value = "Submit">
</form>

<h2>My best friends:</h2>

<?php
    $FileTxt = 'friends.txt';
    $Filter = NULL;
    $Name=NULL;
    $File = fopen("friends.txt","r");
    $Array  = array();
    while(!feof($File))	{
        array_push($Array,fgets($File));
    }


    fclose($File);
    if(isset($_POST['name']) && !empty($_POST['name'])){
        $File = fopen("$FileTxt", "a+");
        $Name = $_POST['name'];
        array_push($Array,$Name);
        fwrite($File,  PHP_EOL."$Name" );
        fclose($File);
    foreach ($Array as $value) {
        echo "<li>".$value."</li>";
        }
    }

    if (isset($_POST['Filter']) && !empty($_POST['Filter']))
    {

        $Filter = $_POST['Filter'];
            foreach ($Array as $value) {
                if(strlen(strstr($value, $Filter)) > 0){
                    echo "<li>".$value."</li>";
                }
            }
    }
    
    else if (empty($_POST['name']) && empty($_POST['Filter']))
    {
        foreach ($Array as $value) {
            echo "<li>".$value."</li>";
        }
    }
?>

<br />

<form action="index.php" method="post">
    <input type="text" name="Filter" value="<?=$Filter?>">
    <input type="submit" value='Filter list'>
</form>

<br />
<footer>
    <h4>Footer</h4>
</footer>

</body>
</html>