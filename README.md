## Caracteristicas

- Implementación de API en codeigniter 3
- Implementación de una base de datos en MySQL

## Requisitos

- PHP version 5.6 a 7.2
- Mysql version 8.0.0

## Instrucciones

- Crear un archivo en la raiz del proyecto llamado .htaccess con el siguiente contenido :
<!--
<Files ~ "^\.(htaccess|htpasswd|ini)$">
deny from all
</Files>
<Files class/parameters.ini>
Order allow,deny
Deny from all
</Files>
<FilesMatch "^\.(htaccess|htpasswd|ini|phps|log|bak|txt|py|pl)$">
 Order Allow,Deny
 Deny from all
</FilesMatch>

RewriteEngine on
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond $1 !^(index\.php|css|js|images|robots.txt)
RewriteRule ^(.*)$ /web_service/index.php/$1 [L]
RewriteBase /web_service
Options -Indexes
DirectoryIndex index.php index.html
order deny,allow
-->

- Crear una carpeta en la ruta del servidor ejemplo C:\xampp\htdocs con el nombre config_access
- Dentro de la carpeta config_access crear un archivo llamado database.php con el siguiente contenido:

<!--

<?php
// DEFAULT
defined('SERVER_HOST') OR define('SERVER_HOST', "127.0.0.1");
defined('SERVER_USER') OR define('SERVER_USER', "root");
defined('SERVER_PASS') OR define('SERVER_PASS', "");
defined('SERVER_DB') OR define('SERVER_DB', "");

// BLOG
defined('BLOG_SERVICE_DB') OR define('BLOG_SERVICE_DB', 'blog_service');
defined('BLOG_SERVICE_USER') OR define('BLOG_SERVICE_USER', 'root');
defined('BLOG_SERVICE_PASS') OR define('BLOG_SERVICE_PASS', '');
?>

-->

- Ejecutar el script de la carpeta script/blog_service.sql para la creación de la base de datos

- Ampliar el tiempo de espera del servidor Apache en el archivo php.ini
- En caso de tener XAMPP es en la siguiente linea
- max_execution_time=1000

