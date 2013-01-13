<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dante
 * Date: 03.12.12
 * Time: 9:32
 * To change this template use File | Settings | File Templates.
 */
class namepace
{

    //public  $root = $_SERVER['DOCUMENT_ROOT'];

    private function  arrayIncludeFile($route, $type)
    {
        return glob($route."/*".$type);

    }
    public function includeClass($route)
    {
           include_once $route;
    }

    public function  includeListClass($route)
    {
        $file_list = $this->arrayIncludeFile($route,'php');
        foreach($file_list as $val)
        {
            include_once $val;
        }
    }

    public function includeCss($rout)
    {
        echo "<link rel=\"stylesheet\" href=".$rout." type=\"text/css\" media=\"screen, projection\" />";
    }

    public function includeListCss($rout)
    {
        $file_list = $this->arrayIncludeFile($rout,'css');
        foreach($file_list as $val)
        {
            echo "<link rel=\"stylesheet\" href=".$val." type=\"text/css\" media=\"screen, projection\" />";
        }
    }
   // protected function Search($nameDirectory)
    //{
      //  return  scandir($nameDirectory);
   // }

    /*private  function  DropDirectory($arrayList)
    {
        $arrayFiles = array();
        $arrayDirectory = array();
        $count = count($arrayList);
        $f=0;$d=0;
        for($i=2; $i<$count; $i++)
        {
            if(strpos($arrayList[$i],'.') === false)
            {
                $arrayDirectory[$d] = $arrayList[$i]; $d++;
            }
            else
            {
                $arrayFiles[$f] = $arrayList[$i]; $f++;
            }
        }
        return array('files'=>$arrayFiles, 'directory'=>$arrayDirectory);
    }

    public  function arrayInfo($source)
    {
        if(empty($source))
        {
            return glob("*", GLOB_ONLYDIR);
        }
        else
        {
            return glob($source."/*", GLOB_ONLYDIR);
        }

    }
    public  function  ListFiles($nameDirectory,$fileName)
    {
        //$root = $_SERVER['DOCUMENT_ROOT']."/developing/class/newclass1";
        $noFile = 0;
        $start = '';
        $array = array();
        $i = 0;
        $data = $this->arrayInfo($start);
        $count = count($data);
        while($noFile != $count)
        {
            $aData = $this->arrayInfo($data[$noFile]);
            $aCount = count($aData);
            for($j=0;$j<$aCount;$j++)
            {
                $data = $this->arrayInfo($aData[$j]);
                if(!empty($data))
                {
                    $array[$i] = $data; $i++;
                    $start = $array[$i];
                    print_r($data);
                }
            }

            $noFile++;
            //$i++;

        }
       // print_r($array);
    }*/
}
?>