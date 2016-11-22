<?php
/**
 * *************************************************************************
 *
 * Copyright (c) 2014 Baidu.com, Inc. All Rights Reserved
 *
 * ************************************************************************
 */
/**
 *
 * @file hello.php
 * @encoding UTF-8
 * 
 * 
 *         @date 2015年3月10日
 *        
 */

require_once '../sdk.php';

// 创建SDK对象.
$sdk = new PushSDK();

//$channelId = '4306396571321180222';

// message content.
$message = array (
    // 消息的标题.
    'title' => '【递国之道】',
    // 消息内容 
    'description' => "感谢您对递国之道的支持，我们会继续努力！" 
);

// 设置消息类型为 通知类型.
$opts = array (
    'msg_type' => 1 
);

// 向目标设备发送一条消息
//$rs = $sdk -> pushMsgToSingleDevice($channelId, $message, $opts);
$rs = $sdk -> pushMsgToAll($message, $opts);

// 判断返回值,当发送失败时, $rs的结果为false, 可以通过getError来获得错误信息.
if($rs === false){
   print_r($sdk->getLastErrorCode()); 
   print_r($sdk->getLastErrorMsg()); 
}else{
    // 将打印出消息的id,发送时间等相关信息.
    print_r($rs);
}

echo "done!";
 