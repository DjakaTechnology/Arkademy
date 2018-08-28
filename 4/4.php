<?php
function fibonancy($w, $h){
    $temp = 0;
    $temp1 = 1;
    $result = "";
    for ($i=0; $i < $h; $i++) { 
        for($j = 0;$j < $w;$j++){
            if($j == 0 & $i == 0)
                $result .= $temp.", ";
            else if($j == 1 && $i == 0)
                $result .= $temp1.", ";
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