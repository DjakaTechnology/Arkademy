<?php
function fibonancy($w, $h){
    $temp1 = 1;
    $temp = 0;
    $result = "";
    for ($i=0; $i < $h; $i++) { 
        for($j = 0;$j < $w;$j++){
            if($j == 0 & $i == 0)
                $result .= "0, ";
            else if($j == 1 && $i == 0)
                $result .= "1, ";
            else{
                $result .= ($temp + $temp1).", ";
                $temporary = $temp;
                $temp = $temp1;
                $temp1 = $temporary + $temp1;
            }
        }
        $result .="<br>";
    }
    return $result;
}

echo fibonancy(4, 3);
?>