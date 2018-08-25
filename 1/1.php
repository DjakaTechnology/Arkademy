<?php
$name = "Djaka Pradana Jaya Priambudi";
$address = "Pasir Wetan RT 5/1, Kec Karanglewas, Banyumas";
$hobbies = array("Programming", "Crafting Something", "Optimizing", "Learn Somthing New", "Gaming");
$is_married = false;
$skills = [
    'Web' => ['CSS', 'HTML', 'JavaScript', 'Php'],
    'Other Language' => ['C#', 'VB', 'Java', 'Python', 'Kotlin'],
    'Desktop Development' => ['.Net', 'Java'],
    'Mobile Development' => ['Android Studio']
];

$school = [
    'highSchool' => 'SMK Telkom Purwokerto',
    'Universitas' => '-'
];

function biodata($name, $address, $hobbies, $is_married, $school, $skills){
    return json_encode(array(
        'name' => $name,
        'address' => $address,
        'hobbies' => $hobbies,
        'is_married' => $is_married,
        'school' => $school,
        'skills' => $skills
    ), JSON_PRETTY_PRINT);
}

echo biodata($name, $address, $hobbies, $is_married, $school, $skills);