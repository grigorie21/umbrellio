<?php

namespace tests;


use PHPUnit\Framework\TestCase;
use src\searcher;
use Symfony\Component\Yaml;



class testApi extends TestCase
{
    public function testFileSize()
    {
        $this->assertTrue(true);
//        require './vendor/autoload.php';

        $r = Yaml\Yaml::parse(file_get_contents('conf.yml'));

        $fp = fopen('somefile.txt', 'w'); // open in write mode.
        fseek($fp, $r['max_size'],SEEK_CUR); // seek to SIZE-1
        fwrite($fp,'a'); // write a dummy char at SIZE position
        fclose($fp); // close the file.
//        $stack = [];


        $t = new searcher();

        $response = $t->find('somefile.txt');
//
        var_dump($t->typeError);



        $this->assertTrue($t->typeError == 'size');


    }
}