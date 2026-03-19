<!DOCTYPE html>
<html>
<head>
<title>Student Result System</title>

<style>
form{
    width: 100%;
    padding:12px;
}
body{
    font-family: Arial;
    background:#f2f2f2;
}

.container{
    width:400px;
    margin:auto;
    margin-top:50px;
    background:white;
    padding:20px;
    border-radius:10px;
}

input{
    width:87%;
    padding:12px;
    margin:5px 0;
    margin-bottom:12px;
}

button{
    width:94%;
    padding:10px;
    background:blue;
    color:white;
    border:none;
    border-radius: 3px;
    background-color:#C08552;
}

.result{
    margin-top:20px;
    padding:15px;
    font-size:18px;
    width:87%;
    margin-bottom:12px;
    margin:5px 0;
    font-family:Khmer OS Metal Chrieng;
}

</style>

</head>

<body>

<div class="container">

<h2>Student Result</h2>

<form method="post">

Student Name:
<input type="text" name="name" placeholder="Enter Name" required>

Absence:
<input type="number" name="absence" min="0" max="30" placeholder="Enter Absence" required>

Midterm:
<input type="number" name="midterm" min="0" max="60" placeholder="Enter MidTerm Score" required>

Final:
<input type="number" name="final" placeholder="Enter Final Score" required>

<button type="submit" name="check">Result</button>

</form>

<div class="result">

<?php

if(isset($_POST['check']))
{

$studentName = $_POST['name'];
$absence = $_POST['absence'];
if($absence>30){
    echo "Absence cannot be more than 30";
}
$midterm = $_POST['midterm'];
if($midterm >60){
    echo "midterm score cannot be more than 60";
    exit();
}
$final = $_POST['final'];

$totalScore = $midterm + $final;

switch(true)
{

case ($absence >= 16):
$result = "គ្មានសិទ្ធិប្រឡងទេ (ត្រូវរៀនសងឡើងវិញ)";
break;

case ($absence >= 11 && $absence <= 15):
$result = "គ្មានសិទ្ធិប្រឡងទេ (ត្រូវប្រឡងសង)";
break;

case ($absence <= 10):

if ($midterm < 20)
{
$result = "ត្រូវរៀនសងឡើងវិញលើមុខវិជ្ជានេះ";
}

elseif ($midterm >= 20 && $totalScore < 60)
{
$result = "ត្រូវប្រឡងសងលើមុខវិជ្ជានេះ";
}

else
{
$result = "ប្រឡងជាប់លើមុខវិជ្ជានេះ";
}

break;

default:
$result = "ទិន្នន័យមិនត្រឹមត្រូវ";

}

echo "<h3>លទ្ធផលសម្រាប់និស្សិត: $studentName</h3>";
echo "អវត្តមាន: $absence ដង <br>";
echo "Midterm: $midterm <br>";
echo "Final: $final <br>";
echo "Total Score: $totalScore<br>";

echo "<strong>Result: $result</strong>";

}

?>

</div>

</div>

</body>
</html>