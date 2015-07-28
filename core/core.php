<?php
/**
 * 
 *  框架核心文件
 * @category Kugou.Com
 * @package core
 * @copyright Copyright &copy; 2013 GuangZhou KuGou Computer Technology Co.,Ltd.
 * @author saoyor <345747439@qq.com>
 * @date 15/6/27
 */



class core
{
    /**
     * 框架初始化
     */
    public static function init()
    {

        spl_autoload_register(array('core','loadClass'));
        //加载全局函数
        include ROOTPATH.'/commond/functions.php';
        //url解析
        Dispatcher::dispatch();
        self::exec();
    }

    /**
     * 自动加载类
     * @param $className
     * @author saoyor <345747439@qq.com>
     */
    public static function loadClass($className)
    {
        $className = strtr($className, '\\', DIRECTORY_SEPARATOR);
        $classFile=ROOTPATH.$className.'.php';

        if(is_file($classFile))
        {
            include $classFile;
        }
    }


    /**
     * @author saoyor <345747439@qq.com>
     */
    public static function exec()
    {

        $class='\\'.MODEL.'\\controller\\'.CONTROLLER;
        $classFile=APP_PATH.MODEL.'/controller/'.CONTROLLER.'.php';

        include $classFile;
        $obj=new $class();
        $args=$_GET['args'];

        $classObj=new \ReflectionClass($obj);

        $l=$classObj->getMethods();
        $l=$classObj->getMethod(ACTION);
        $l->invokeArgs($obj,$args);


    }
}