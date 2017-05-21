<?php

namespace Quefei\AliyunMns\Contracts;

interface AliyunMnsContract
{
    /**
     * 发送短信
     *
     * @param  string  $phoneNumber
	 * @param  string  $signName
	 * @param  string  $templateCode
	 * @param  array   $templateParam
     * @return string  用户发送的每次接口调用请求，无论成功与否，系统都会返回一个唯一识别码 RequestId 给用户
     */
    public function sendMessage($phoneNumber, $signName, $templateCode, array $templateParam = []);
}
