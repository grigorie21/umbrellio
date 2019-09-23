<?php


use src\searcher;
use Symfony\Component\Yaml\Yaml;

require __DIR__.'/vendor/autoload.php';

//require 'src/searcher.php';

$y = new searcher();

$r = Yaml::parse(file_get_contents('conf.yml'));
//
//if(filesize('test.txt')>2000)
//{
//echo ('dsfdsfdsfdsfdsfsdfdsfdsfdsf');
//}

//if(filesize('test.txt')>50)
//{
//    echo ('dsfdsfdsfdsfdsfsdfdsfdsfdsf');
//}

var_dump($r['max_size']);

$res = $y->find('w.png', 'dog');
//
var_dump($res);