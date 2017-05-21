<?php

namespace Quefei\AliyunMns\Services;

use Quefei\AliyunMns\Contracts\AliyunMnsContract;

require_once(__DIR__.'/../Sdk/mns-autoloader.php');

use AliyunMNS\Client;
use AliyunMNS\Topic;
use AliyunMNS\Constants;
use AliyunMNS\Model\MailAttributes;
use AliyunMNS\Model\SmsAttributes;
use AliyunMNS\Model\BatchSmsAttributes;
use AliyunMNS\Model\MessageAttributes;
use AliyunMNS\Exception\MnsException;
use AliyunMNS\Requests\PublishMessageRequest;

class AliyunMnsService implements AliyunMnsContract
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
    public function send($phoneNumber, $signName, $templateCode, array $templateParam = [])
    {
        /**
         * Step 1. 初始化Client
         */
        $this->endPoint = config('aliyunmns.MnsEndpoint'); // eg. http://1234567890123456.mns.cn-shenzhen.aliyuncs.com
        $this->accessId = config('aliyunmns.AccessKeyID');
        $this->accessKey = config('aliyunmns.AccessKeySecret');
        $this->client = new Client($this->endPoint, $this->accessId, $this->accessKey);
		
		
		
        /**
         * Step 2. 获取主题引用
         */
        $topicName = config('aliyunmns.TopicName');
        $topic = $this->client->getTopicRef($topicName);
		
		
		
        /**
         * Step 3. 生成SMS消息属性
         */
		 
		// 3.1 设置发送短信的签名（SMSSignName）和模板（SMSTemplateCode）
        $batchSmsAttributes = new BatchSmsAttributes($signName, $templateCode);
		
		// 3.2 （如果在短信模板中定义了参数）指定短信模板中对应参数的值
        $batchSmsAttributes->addReceiver($phoneNumber, $templateParam);
        $messageAttributes = new MessageAttributes(array($batchSmsAttributes));
		
		
		
        /**
         * Step 4. 设置SMS消息体（必须）
         *
         * 注：目前暂时不支持消息内容为空，需要指定消息内容，不为空即可。
         */
        $messageBody = "smsmessage";
		
		
		
        /**
         * Step 5. 发布SMS消息
         */
        $request = new PublishMessageRequest($messageBody, $messageAttributes);
        try
        {
            $res = $topic->publishMessage($request);
            echo $res->isSucceed();
            echo "\n";
            echo $res->getMessageId();
            echo "\n";
        }
        catch (MnsException $e)
        {
            echo $e;
            echo "\n";
        }
    }
}
