## LOOTOM 旅游系统 开发版工具扩展

---

### 安装
    
 1. composer:
    
    ```
    composer require wanghouting/lt-dev-tools
    ```

 2. 初始化
     - 如果之前没有安装laravel-admin,需要先执行
    ```
    php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"
    
    php artisan admin:install
    ``` 

 	```
 	php artisan lttools:install 
 	```

 3. 添加导航悬浮球
 
 	- 将"  \LTTools\Extension\Facades\LTTools::showNav();" 添加到父控制器的构造函数里；	
	