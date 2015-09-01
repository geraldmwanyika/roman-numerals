<?php 
include("Repository/RomanNumeralGeneratorRepository.php");

$romanNumberGen = new RomanNumeralGeneratorRepository();

$number_results = "";
$roman_results = "";

if(!empty($_POST['number'])) {
    $numb = $_POST['number'];
    $number_results = $romanNumberGen->generate($numb);
} elseif(!empty($_POST['roman'])) {
    $roman = $_POST['roman'];
    $roman_results = $romanNumberGen->parse($roman);
}

?>

<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Roman Numerals</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="assets/css/app.css">
    </head>
    <body>
        <div class="wrapper">
            <h2>Coding Kata: Roman Numerals</h2>
            <div class="form">
                <form id="roman_numbers" name='roman_numbers' method="post" action="">  
                    <ul>  
                    <li><label for="number">Please enter integer:</label></li>  
                    <li><input type="text" name="number" id="number" size="12" /></li>  
                    <li><label for="roman">Please enter Roman numeral:</label></li>  
                    <li><input type="text" name="roman" id="roman" size="12" /></li> 
                    <li><input type="submit" name="submit" value="Submit" /></li>  
                    </ul>  
                </form> 
            </div>
            <div class="results">
                <?php if(!empty($number_results)) : ?>
                    <p>Convert Integer to Roman numeral: <?php echo $numb . " = " . $number_results;?></p>
                <?php endif;?>
                <?php if(!empty($roman_results)) : ?>
                    <p>Convert Roman numeral to Integer: <?php echo $roman . " = " . $roman_results;?></p>
                <?php endif;?>
            </div>
        </div>

        <script src="assets/js/app.min.js"></script>
    </body>
    </html>
