<?php
namespace IMocc;
/**
 * 代理模式
 * 1.在客服端与实体之间建立一个代理对象（proxy），客服端对实体进行操作全部委派给代理对象，隐藏实体的具体实现细节
 * 2.Proxy 还可以与业务代码分离，部署到临外的服务器。业务代码中通过RPC来委派任务
 * Interface IUserProxy
 * @package IMocc
 */
interface IUserProxy
{
    function getUserName($id);

    function setUserName($id,$name);
}