<?php

//phpinfo();

$input = "1,2,3,4,5,6,7";

$soma = array_sum ( explode ( ',' , $input ) );

print_r($soma);

echo "</br>";
echo "</br>";
echo "</br>";

$primeiro_array = ["Laranja", "Limão", "Banana", "Pêra", "Maçã"];

$segundo_array = ["Laranja", "Uva", "Jaboticaba" ,"Limão", "Banana"];

// array_merge(array 1 , array 2) -> função para juntar dois arrays, pegando o array 1 e depois o array 2
$terceiro_array = array_merge($primeiro_array, $segundo_array);

echo "<pre>";
print_r($terceiro_array);
echo "<pre>";

echo "<pre>";
// array_unique(array) -> nao permite elementos repetidos no array
$terceiro_array = array_unique($terceiro_array);
print_r($terceiro_array);
echo "<pre>";

?>
