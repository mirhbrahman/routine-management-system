<?php

function semesters()
{
  $sems =[1,2,3,4,5,6,7,8];
  return $sems;
}

function days($id=0){
  $days = [
    1=>'SAT',
    2=>'SUN',
    3=>'MON',
    4=>'TUE',
    5=>'WED',
    6=>'THU',
  ];

  if ($id) {
    return $days[$id];
  }else{
    return $days;
  }
}
?>
