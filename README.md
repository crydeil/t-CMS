<table>
<tbody>
<tr>
<td><img src="https://raw.github.com/VikkyShostak/t-CMS/master/theme/img/t-cms-logo.png"></td>
<td>By <a href="http://totstar.ru" target="_blank">totstar</a> projects team<br />
Last version: <code>0.1 beta6</code> (25-09-2012, 23:47)</td>
</tr>
</tbody>
</table>

===

## English
Easy and flexible micro-CMS for everyday tasks when there is no time to learn Drupal or WordPress, and your 
website/blog is very desirable. The visual part (admin panel and theme by default) is made using front-end framework 
`Twitter Bootstrap v2.1.1` and `Font Awesome v2.0`.

### Also include:
* jQuery Core `latest version`
* Redactor.JS WYSIWYG `v8.0.3`

### System requirements (server)
* Apache `2.3.x` (enabled module `mod_rewrite`)
* PHP `5.4.x` (not less than `32 MB` of available memory)
* MySQL `5.3.x`

### Simple Install
* Unzip file `t-CMS.tar.gz` into your server
* Import DB dump from a file `./t-admin/dump.sql` in your MySQL server
* Edit file `./t-admin/config.php` (only the specified line):

```php
// System paths
define('BASE_URL', 'http://your-site.com');

// MySQL connect
define('DBserver', 'your.mysql.server.com');
define('DBuser', 'user');
define('DBpassword', 'pass');

// MySQL prefix_ + table
define('DBprefix', 'my_pref_'); // optional, indicated only for safety
define('DBbase', DBprefix.'my_DB_name');
```
* Open link in a browser `http://your-site.com/first-install.php` and enter your user name, password (twice) and the 
site name (which will be the `title` and `h1` tags for the home page).
* Congratulations!

### Site Manager
* Admin panel is available at `http://your-site.com/t-admin/index`

### Information for Developers
* Classes t-CMS are in the `./t-admin/t-classes`
* To connect the classes use the function `__autoload()`

===

## Русский
Лёгкая и гибкая микро-CMS для решения повседневных задач, когда нет времени на изучение Drupal или WordPress, а свой 
сайт/блог очень хочется. Визуальная часть (панель администратора и тема по-умолчанию) выполнена с использованием 
front-end фреймворка `Twitter Bootstrap v2.1.1` и `Font Awesome v2.0`.

### Также включены:
* jQuery Core `последняя версия`
* Redactor.JS WYSIWYG `v8.0.3`

### Системные требования (сервер)
* Apache `2.3.x` (с включённым модулем `mod_rewrite`)
* PHP `5.4.x` (не менее `32 MB` доступной памяти)
* MySQL `5.3.x`

### Простая установка
* Распакуйте содержимое файла `t-CMS.tar.gz` на ваш сервер
* Импортируйте дамп БД из файла `./t-admin/dump.sql` в ваш MySQL сервер
* Отредактируйте файл `./t-admin/config.php` (только указанные строки):

```php
// Системные пути 
define('BASE_URL', 'http://ваш-сайт.ru');

// Соединение с MySQL
define('DBserver', 'ваш.mysql.сервер.ru');
define('DBuser', 'пользователь');
define('DBpassword', 'пароль');

// MySQL префикс_ + таблица
define('DBprefix', 'мой_префикс_'); // не обязательно, указывается только в целях безопасности
define('DBbase', DBprefix.'моё_имя_БД');
```
* Откройте в броузере ссылку `http://ваш-сайт.ru/first-install.php` и введите имя пользователя, пароль (дважды) и 
название сайта (которое будет являться тегами `title` и `h1` для главной страницы).
* Поздравляем!

### Управление сайтом
* Панель администратора доступна по адресу `http://ваш-сайт.ru/t-admin/index`
 
### Информация для разработчиков
* Классы t-CMS находятся в папке `./t-admin/t-classes`
* Для подключения классов используется функция `__autoload()`