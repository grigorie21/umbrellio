<?php

use Buonzz\Template\searcher;

require 'src/searcher.php';

$y = new searcher();

$res = $y->find('test.txt', 'dog');

var_dump($res);