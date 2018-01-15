# LanguageList
A simple list of languages. It's useful for applied as witdget.

**********************************************
Crud of courses(Steps for install and test)
**********************************************

1) Clone repository 
git clone https://github.com/mmgg2/LanguageList.git

--------------------------------------------------------------------------------
2) Run script mysql for create database and table
Path: /LanguageList/database/migrations/courses.sql

--------------------------------------------------------------------------------
3)Configure user and password for access to databases:

In /LanguageList/config/database.php

and  /LanguageList/.env

--------------------------------------------------------------------------------

4)For test the application in the browser, run PHP's Built-in Web Server

In /languagetrainerstest/proyectdev/ 

execute sudo php artisan serve

--------------------------------------------------------------------------------
5)Now you can point your browser to:

 http://localhost:8000/courses
