<?php
namespace IMocc;

/**
 * 策略模式
 * 1.策略模式，将一组特定的行为和算法封装成类，以适应某些特定的上下文环境，这种模式就是策略模式
 * 2.实际应用举例，假如一个电商网站系统，针对男性女性用户要各自跳转到不同的商品类目，并且所有广告位展示不同的广告
 * 3.使用策略模式可以实现Ioc，依赖倒置控制反转
 */
interface UserStrategy
{
    //展示广告
    function showAd();

    //展示类目
    function showCategory();
}