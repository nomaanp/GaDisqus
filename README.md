## Install
```
curl -s http://getcomposer.org/installer | php
php composer.phar require gianarb/ga-disqus
```
Add into ``` config/application.config.php ``` GaDisqus modules.
Now you are ready!

## Configuration
There are two type of use for this module

### Simple view helper
You can use it how viewHelper, in your view.phtml
```php
<?=$this->disqus('shortName')?>
```
How params you can set in this order
* shortName
* identifier
* title
* url
* categoryId

### Service factory view helper
Or you can set a parameters into an array and you can use disqusFactory view helpers
```php
<?=$this->disqusFactory()?>
```

You can copy into ``` config/local ``` my .dist configuration ``` GaDisqus/config/disqus.local.php.dist ``` and rename it!


## Run unit test
(into module root)
```
curl -s http://getcomposer.org/installer | php
php composer.phar install
cd tests
../vendor/bin/phpunit -c phpunit.xml
```
