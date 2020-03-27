# Mindas README
### 1、代码规范
常量要求：全拼、英文大写，单词之间可以用下划线分割
一般变量要求：全部用具有相应意义的全拼英文小写
类文件与类：类文件名需要与类名一致，全部采用 驼峰 写法(每个单词首字母大写)
           类方法、属性变量值，统一采用驼峰，
namespace:
           尽量与目录名保持一致
           eg: /controllers/test/TestController.php
                namespace Controllers\Test;
包目录名：全部用小写，不能用数字。

项目要求：
    1、控制器、模型、视图依次放于/app 目录下对应位置，前两者需要有namespace 约束，遵循上面的定义
    2、资源文件统一放于/public/storage/webres/ 目录中,代码中引入举例：
    <script src="/storage/webres/test.js"></script>

### 2、目录描述
|ApplicationName
    |app (include the file of business)
        |controllers
        |models
        |views
    |cache (caching file loc)
    |config(file of configuration)
         config.php
         database.php
    |framework(framework related file)
        |core(framework core file)
            Application.php
            Controller.php
            RouteLoader.php
            ViewLoader.php
        |db(database related operation file)
        |facade(framework facade file)
            Request.php
            Route.php
        |helpers(framework helpers loc)
        |library(third party app or plugin)
    |public(entrance of the project)
        |storage(file or data storage for dev(ers) )
            |upload(temp dir of upload file)
            |webres(web static resources eg:js,css,img,vioce)
    |routes(custom routing rules)
        web.php
    README.md(project introduce)