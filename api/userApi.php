<?php
/**
* API接口服务端
*/
require 'includes/db.php';
$dbFacade=new DbFacade();
$UserName=$_REQUEST["UserName"];
$Password=$_REQUEST["Password"];
$Email=$_REQUEST["Email"];

header('Content-Type:text/html;charset=utf-8');
$action=$_GET['action'];
switch($action){
    case 'login':
        $datas = $dbFacade->Login($UserName,$Password);
        if(sizeof($datas)>0){
            echo '{"Code":0,"Msg":"登录成功","Users":'.json_encode($datas).'}';
        }else{
            echo '{"Code":-1,"Msg":"账号或密码错误"}';
        }
    break;
    case 'register':
        $datas=$dbFacade->Register($UserName,$Password,$Email);
        if($datas){
            echo '{"Code":0,"Msg":"注册成功"}';
        }else{
            echo '{"Code":-1,"Msg":"注册失败"}';
        }
    break;
    default:
        echo '接口调用失败';
    break;
}
?>