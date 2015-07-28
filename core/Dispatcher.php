<?php
/**
 * URL 解析 路由 和调度
 *
 * url 只支持get方法 和 英文数字的 参数
 *
 * 如果使用中文一律用post
 *
 * @category Kugou.Com
 * @package core
 * @copyright Copyright &copy; 2013 GuangZhou KuGou Computer Technology Co.,Ltd.
 * @author saoyor <345747439@qq.com>
 * @date 15/7/15
 */


class Dispatcher {

    public static function dispatch()
    {

        $pathInfo=$_GET['s'];



        unset($_GET['s']);

        $paths=explode('/',$pathInfo);

        //获取模块名
        $modelName=array_shift($paths);
        define('MODEL',$modelName);
        $_GET['m']=$modelName;

        //获取控制器名
        $controllerName=array_shift($paths);
        $controllerName=ucfirst($controllerName);
        define('CONTROLLER',$controllerName);
        $_GET['c']=$modelName;

        //获取方法名
        define('ACTION',array_shift($paths));
        $_GET['f']=$modelName;

        $_GET['args']=$paths;

    }

}