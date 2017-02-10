<?php
/**
 * Created by PhpStorm.
 * User: Levi
 * Date: 2017/2/7
 * Time: 16:27
 */
$arr[]="1";
$arr[]='2';
$arr['k']='v';
$arr['k1']='v1';
test($arr);
var_dump( $arr);

function test(&$data){
    $data['test_k']="test_v";
    return $data;
}