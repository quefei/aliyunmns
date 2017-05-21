# AliyunMns for Laravel　阿里云短信服务    

## 安装    

composer require quefei/aliyunmns dev-master    

config/app.php    

providers 数组中：    

Quefei\AliyunMns\Providers\AliyunMnsServiceProvider::class,    

aliases 数组中：    

'MNS' => Quefei\AliyunMns\Facades\MNS::class,    

php artisan vendor:publish    

ALIYUN_MNS_ACCESS_KEY_ID=    
ALIYUN_MNS_ACCESS_KEY_SECRET=    
ALIYUN_MNS_ENDPOINT=    
ALIYUN_MNS_TOPIC_NAME=    
