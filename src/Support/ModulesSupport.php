<?php


namespace LTTools\Extension\Support;


class ModulesSupport
{

    public  function getSubModulesData(){
        $modules = $this->getSubModules();
        foreach ($modules as $k=>&$v){

        }

        return $modules;
    }

    public function getBranch()
    {
        $file = base_path('vendor/branch.txt');
        if(file_exists($file)){
            return file_get_contents($file);
        }
        return 'master';
    }

    protected function getSubModules(){
        $path = base_path('Modules');
        $modules = [];
        $modules[] = [
            'name' => 'Framework',
            'path' => base_path()
        ] ;
        if(@$handle = opendir($path)){
            while(($dir = readdir($handle)) !== false) {
                if($dir != ".." && $dir != ".") { //排除根目录；
                    if(is_dir($path."/".$dir)) { //如果是子文件夹，就进行递归
                        $modules[] = [
                            'name' => $dir,
                            'path' => $path."/".$dir
                        ] ;
                    }
                }
            }
            closedir($handle);
        }
        return $modules;
    }



}