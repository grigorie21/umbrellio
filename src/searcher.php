<?php namespace Buonzz\Template;

class searcher
{
    /**
     * @param $pathToFile
     * @param $needle
     * @return array
     */
    public function find($pathToFile, $needle)
    {
        $file = file($pathToFile);
        $result = [];

        foreach ($file as $k => $v) {
            $offset = 0;

            while (strpos($v, $needle, $offset)) {
                $result[$k][] = strpos($v, $needle, $offset);
                $offset += strpos($v, $needle, $offset) + strlen($needle);
            }
        }

        return $result;
    }
}