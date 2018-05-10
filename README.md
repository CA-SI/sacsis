# SACSIS
Website da Semana Academica de Sistemas de Informação da Universidade Federal de Viçosa - Campus Rio Paranaíba

```
composer create-project laravel/laravel sacsis2018
composer require "grafite/builder"
php artisan vendor:publish --provider="Yab\CrudMaker\CrudMakerProvider"
php artisan vendor:publish --provider="Yab\FormMaker\FormMakerProvider"
php artisan grafite:starter
php artisan grafite:socialite

php artisan crudmaker:new Orador --ui=bootstrap --migration --schema="id:increments,name:string,company:string,cpf:integer,rg:integer,cellphone:integer,facebook:string,twitter:string,linkedin:string,avatar:string" --relationships="hasMany|App\Palestra|palestra,hasMany|App\Workshop|workshop"

php artisan crudmaker:new Participante --ui=bootstrap --migration --schema="id:increments,name:string,company:string,institution:string,entryYear:integer,cpf:integer,rg:integer,cellphone:integer,facebook:string,twitter:string,linkedin:string,avatar:string,organizer:string" --relationships="hasMany|App\Palestra|palestra,hasMany|App\Workshop|workshop"

php artisan crudmaker:new Palestra --ui=bootstrap --migration --schema="id:increments,idSpeaker:integer,name:string,description:string,date:timestamp,startSchedule:time,endSchedule:time,local:string" --relationships="hasOne|App\Programacao|programacao,belongsTo|App\Orador|orador"

php artisan crudmaker:new Workshop --ui=bootstrap --migration --schema="id:increments,idSpeaker:integer,name:string,description:string,date:timestamp,startSchedule:time,endSchedule:time,local:string" --relationships="hasOne|App\Programacao|programacao,belongsTo|App\Orador|orador"

php artisan crudmaker:new Programacao --ui=bootstrap --migration --schema="id:increments,name:string,description:string,date:timestamp,startSchedule:time,endSchedule:time,local:string" --relationships="hasMany|App\Palestra|palestra,hasMany|App\Workshop|workshop"

php artisan crudmaker:new FAQ --ui=bootstrap --migration --schema="id:increments,category:string,question:string,anwser:string"

php artisan crudmaker:new Foto --ui=bootstrap --migration --schema="id:increments,url:string,description:string"
```
