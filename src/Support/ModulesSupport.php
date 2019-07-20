<?php


namespace LTTools\Extension\Support;



use LTTools\Extension\Exceptions\LTToolsWebConsoleException;
use LTTools\Extension\Facades\WebConsole;

class ModulesSupport
{

    public  function getSubModulesData(){
        $modules = $this->getSubModules();

        return $modules;
    }

    /**
     * 获取git分支
     * @return string
     */
    /**
     * @return string
     */
    public function getBranch()
    {
        try{
            $consoleResult  = WebConsole::execute_command('git branch');
            $branchStr = $consoleResult['output'];
            $branchArr = explode("\n",$branchStr);
            foreach ($branchArr as $branch){
                $b =  explode('* ', $branch);
                if(count($b)  == 2){
                    return $b[1];
                }
            }
        }catch (\Exception $exception){

        }

       return 'unknown';
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