<?php

class witchCalculator {
  public $age = [];
  public $year = [];
  public $result = 0;

  function set_person_data($age, $year){
    if($year < 0 || $age < 0 || $age >= $year){
      return -1;
    }

    array_push($this->age, $age);
    array_push($this->year, $year);
  }
  
  function calculate(){
    $temp = 0;
    $personCount = count($this->age);
    echo "ANSWER<br>";
    for($i = 0; $i < $personCount; $i++){
      $bornOnYear = $this->year[$i] - $this->age[$i];
      
      echo "Person $i born on Year = " . $this->year[$i] . " – " . $this->age[$i] . " = " . $bornOnYear;
      $killOnYear = $this->get_kill($bornOnYear);
      
      echo ", number of people killed on year $bornOnYear is $killOnYear <br>";
      $temp += $killOnYear;
    }

    $result = $temp / $personCount;
    echo "The average is $temp / $personCount = " . $result;
  }

  function get_kill($year){
    $arrResult = [];
    $next = 1;
    $curr = 0;
    for($i = 0; $i < $year; $i++){
      if($i == 0){
        array_push($arrResult, 1);
      } else {
        $temp = $curr + $next;
        array_push($arrResult, $temp);
        
        $curr = $next;
        $next = $temp;
      }
    }
    return array_sum($arrResult);
  }

}

$calculator = new witchCalculator();
$calculator->set_person_data(10, 12);
$calculator->set_person_data(13, 17);

$calculator->calculate();
?>