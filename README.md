## 安装

克隆该项目

```php
git clone https://github.com/raomingchao/laracasts-downloader.git
```

进入项目目录
```php
cd laracasts-downloader
```

安装相关库
```php
composer install
```
> composer 中国镜像 [Packagist / Composer 中国全量镜像](http://pkg.phpcomposer.com/) 来加速安装过程


## 配置
编辑 `app/config.php`

- cookie：复制你的 cookie 到这里
- save_path: 设定文件保存的文件目录，必须保证 php 对该目录有写的权限
- proxy：代理设定，可以加快视频解析速度，如果不用代理，设为空即可。默认的 `socks5h://127.0.0.1:1080` 是 `Shadowsocks` 的默认客户端代理地址

## 使用
编辑 `index.php`，下面是样例：

#### 修改series链接
```php
$seriesUrl = 'https://laracasts.com/series/vim-mastery';
```

#### 批量保存下载地址
```php
php index.php
```

#### 打开 [Aria2GUI](https://github.com/MacGapProject/MacGap1) Add Task 粘贴生成的downloadUris.txt至地址栏处即可点击Add