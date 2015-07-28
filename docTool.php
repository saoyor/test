<?php
/**
 *
 * 自动生存文档
 *
 * @category Kugou.Com
 * @copyright Copyright &copy; 2013 GuangZhou KuGou Computer Technology Co.,Ltd.
 * @author saoyor <345747439@qq.com>
 * @date 15/7/25
 */
header('Content-Type: text/html; charset=utf-8');
require_once __DIR__.'/core/lib/Michelf/Markdown.inc.php';
require_once __DIR__.'/core/lib/Michelf/MarkdownExtra.inc.php';
$class='\home\controller\Index';
$classFile=__DIR__.'/application/home/controller/Index.php';
include $classFile;
$obj=new $class();
$classObj=new \ReflectionClass($obj);

$l=$classObj->getMethod('index');
$doc=$l->getDocComment();


$doc=str_replace('/**','',$doc);
$doc=str_replace('*/','',$doc);
$doc=str_replace('*','',$doc);
$docArr=explode(' @',$doc);
$doc.="\n";
$doc.='sadf';
$doc.="\n";
$doc.='>sadf';
$doc.='sadf';


if(!is_dir(__DIR__.'/doc/'))
{
    mkdir(__DIR__.'/doc/',0755,true);
}
file_put_contents(
    __DIR__.'/doc/index.md',
    $doc
);

$docStr=file_get_contents(__DIR__.'/doc/index.md');

$parser=new \Michelf\MarkdownExtra();

$docHtml='<html> <link href="md.css" rel="stylesheet" type="text/css"/><body class="markdown-body">';
$docHtml.=$parser->defaultTransform($docStr);
$docHtml.='</body></html>';
echo $docHtml;