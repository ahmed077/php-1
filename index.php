<?php
if (!is_dir(__DIR__ . '/docs')) {//check if a directory called docs exists or not
    mkdir(__DIR__ . '/docs');//create docs directory
}
//scandir(path): open path and return name of all files in it + . (current directory) & .. (parent directory) as command line
//count(array): return number of elements in array
if (count(scandir(__DIR__ . '/docs')) === 2) {//check if there's files in docs directory or not
    $letters = ['A','B','C','D','E'];//letters example
    for ($i = 0; $i < 3; $i++) {//create three files
        $number_of_letters = rand(5, 10);//get random number between 5 and 10
        $text = '';//create empty string variable to put the text in it
        for ($j = 0; $j < $number_of_letters; $j++) {
            $text .= ' ' . $letters[array_rand($letters, 1)];//get a number of letters equal to the number generated
        }
        $file_created = fopen(__DIR__ . '/docs/document_' . $i . '.txt', 'a+');//create new file
        fwrite($file_created, trim($text));//put the text generated into the file
        fclose($file_created);//close the file
    }
}
$files = array_slice(scandir(__DIR__ . '/docs'),2);//scans the directory to get all files and removing the first two elements ( . & .. )
$docs = [];//create empty array to put the text files in it
foreach ($files as $file) {//loop through all files into the folder
    $arr = explode('.', $file);//separate the file's name after each comma
    if ($arr[count($arr) - 1] === 'txt') {//checks if the extension is txt
        $docs[count($docs)] = $file;//add the txt files into docs array
    }
}


    

    //Query
if( $_POST["query"])
{  
    $RegQuery= $_POST['query'];
    echo($RegQuery);
    
}
    
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
    <input type="text" name="query" placeholder="query input">
    <input type="submit">
</form>
</body>
</html>
