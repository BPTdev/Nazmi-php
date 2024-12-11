<?php

$array = array(1, 2, 3);

$newArray = [10,20,30];

$assocArray = [
    'type' => 'Pomme',
    'name' => 'value2',
    0 => 'value3'
];
//$a = new a();
//$b = new b();

echo $newArray[0];
echo $assocArray[0];



class a {
    public $a = 1;
    public $b = 2;
    public $c = 3;
    public $d;

    public function __construct($d) {
        $this->d = $d;
    }
}
class b {
    public $a = 1;
    public $b = 2;
    public $c = 3;
    public $d;

    public function __construct($d=4) {
        $this->d = $d;
    }
}
$instansiation_de_la_classe_a = new a('Valeur de D');
$instansiation_de_la_classe_b = new b();



br();
echo $instansiation_de_la_classe_a->d;
br();
echo $instansiation_de_la_classe_b->d;










function br () {
    echo '<br>';
}