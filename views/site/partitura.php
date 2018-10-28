<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$this->title = 'Партитура';
$this->params['breadcrumbs'][] = $this->title;
if($partitura!=null){
echo($partitura[0]->caption);
echo("<br>Files: ");
$i = 1;
foreach($media as $md){
    echo("<img src='http://localhost/test$md->src' height='42' width='42'/> $i)$md->src");
    $i++;
}
}
if($partituras!=null){
    echo("Partituras:<br>");
    foreach($partituras as $part){
        echo("<a href='?id=$part->id'>[$part->id] $part->caption</a>");
    }
}
?>

