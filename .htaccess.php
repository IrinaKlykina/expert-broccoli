<?php
DirectoryIndex index.php

AddDefaultCharset utf-8

RewriteEngine on
RewriteBase /
RewriteRUle ^(.*)$ index.php

?>