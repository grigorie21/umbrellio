<?php namespace src;

use Symfony\Component\Yaml\Yaml;

class searcher
{
    public $find1;
    public $typeError;



    public function find($pathToFile = 'test.txt', $needle = 'dog')
    {

        $r = Yaml::parse(file_get_contents('conf.yml'));

        if(filesize($pathToFile)>$r['max_size'])
        {
            $this->typeError = 'size';

//            $list = [
//                'status' => 'error',
//                'error_type' => 'size',
//                'message' => "File size is over {$r['max_size']} kBytes"
//            ];
            http_response_code(400);
//            return json_encode($list);
return true;
        }

        if(mime_content_type($pathToFile)!=$r['mime-type'])
        {

            $list = [
                'status' => 'error',
                'message' => "Type is not {$r['mime-type']}",
            ];
            http_response_code(400);
            return json_encode($list);
           }


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