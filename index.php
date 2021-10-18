<?php
if (isset($_POST['calculate'])) { 
    // echo "All Days: ". round($duration);
// start end dates
$from = date('Y-m-d', strtotime($_POST['first-day']));
$to = date('Y-m-d', strtotime($_POST['second-day']));
$total_days = (strtotime($to) - strtotime($from))/86400;
echo 'Days :'.($total_days).'<br>';
$year = substr($from, 0, 4);
//    
$easterDays = 4; 
//    
$newYear = $year . "-01-01";
$robMugabe = $year . "-02-21";
$robMugabe2 = $year . "-02-22";
$independenceDay = $year . "-04-18";
$workersDay = $year . "-05-01";
$africaDay = $year . "-05-25";
$heroesDay = $year . "-08-09";
$defenceDay = $year . "-08-10";
$unityDay = $year . "-12-22";
$christmasDay = $year . "-12-25";
$boxingDay = $year . "-12-26";
$excludeDays = 0;
$sundayHolidays = 0;
// 
$holidays = [$newYear, $robMugabe, $robMugabe2, $independenceDay, $workersDay, $africaDay, $heroesDay, $defenceDay, $unityDay,$christmasDay, $boxingDay];
while ($from <= $to) {
    // echo $from . " Day :" . date('l', strtotime($from)) . "<br>";
    for($hl = 0; $hl < count($holidays); $hl++) {
       if ($from == $holidays[$hl]) {
          $excludeDays = $excludeDays + 1;
       }
    }
    // increment days
    $from = date('Y-m-d', strtotime($from . ' +1 day'));
}
echo $excludeDays;
}
function determineEasterday($Y){
     // Gauss Easter Algorithm
     $A = $Y % 19;
     $B = $Y % 4;
     $C = $Y % 7;
     $P = (float)($Y / 100);
     $Q = (float)((13 + 8 * $P) / 25);
     $M = (15 - $Q + $P - $P / 4) % 30;
     $N = (4 + $P - $P / 4) % 7;
     $D = (19 * $A + $M) % 30;
     $E = (2 * $B + 4 * $C + 6 * $D + $N) % 7;
     $days = (int)(22 + $D + $E);
      // when D is 29
    if (($D == 29) && ($E == 6))
    {
        return ($Y . "-04" . "-19");
    }
    elseif (($D == 28) && ($E == 6))
    {
        return ($Y ."-04" ."-18");
    }
    else
    {
        // If days > 31, move to April
        // April = 4th Month
        if ($days > 31)
        {
           return ($Y . "-04-" .($days - 31));
        }
        // Otherwise, stay on March
        // March = 3rd Month
        else
        {
            return ($Y . "-03-" . $days);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <label for="first-day">First Day</label>
        <input type="date" name="first-day"><br><br>
        <label for="second-day">Second Day</label>
        <input type="date" name="second-day"><br><br>
        <button type="submit" name="calculate"> Calculate</button>
    </form>
</body>

</html>
