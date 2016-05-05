PHP_Recipes
===========
PHP_Recipes is a simple and elegent web app designed to work on a home web server. 


*NOTICE*
--------
PHP_Recipes has been designed for use on a local web server (i.e behind a firewall), therefore there is no login or other kind of authentication or hardened security. If you plan on using this on a publicly accessible server then you should make the neccessary modifications.


Requirements
------------
- Web Server (e.g Apache httpd)
- PHP - v5.3.0+ (MySQLi extension)
- MySQL - v5.7+



Installation
------------
To install PHP_Recipes you will need to edit the file 'user-options.php' in the 'includes' directory. Here you need to at the very least set the 4 database settings needed to connect to your database, server name (i.e localhost) username, password and database name. You can leave the database name to the default value and use the file 'Create_Database.sql' to create the neccessary database and tables. You can also use the file 'Insert_Data.sql' (after using other file first) to insert some recipes immediately for use. The site should now work right out of the box if you browse to the root folder in your web browser (i.e http://localhost/php_recipes ).
