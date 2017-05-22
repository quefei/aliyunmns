# AliyunMns for Laravel 阿里云短信服务




## （一）安装



### 1. 安装：


```php
  composer require quefei/aliyunmns:dev-master
```



### 2. 注册：


⑴ 在 config/app.php 文件的 providers 数组中加入：

```php
  Quefei\AliyunMns\Providers\AliyunMnsServiceProvider::class,
```


⑵ 在 config/app.php 文件的 aliases 数组中加入：

```php
  'MNS' => Quefei\AliyunMns\Facades\MNS::class,
```




## （二）配置




## （三）使用

