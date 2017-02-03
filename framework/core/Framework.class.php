<?php

/**
 * 核心启动类
 * User: Levi
 * Date: 2017/2/3
 * Time: 17:18
 */
class Framework
{
    //run方法
    public static function run(){
//        echo "hello,world";
        self::init();
//        self::autoload();
//        self::dispatch();
    }

    /**
     * 初始化方法
     */
    private static function init()
    {

    }

    /**
     * 自动载入
     * 此处，只加载application中的controller和model
     */
    private static function autoload()
    {
        spl_autoload_register('self::load');

    }

    /**
     * 完成指定类的加载
     * 只加载application中的controller和model,如GoodsController，BrandModel
     */
    public static function load($classname){

    }

    /**
     * 路由分发，说白了，实例化对象调用方法
     * index.php?p=admin&c=goods&a=add--后台的GoodsController中的addAction
     */
    private static function dispatch()
    {

    }
}