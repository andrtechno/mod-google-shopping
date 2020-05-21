mod-google-shopping
===========
Guys, we definetly need to do something with this repo. I see several ways:


Installation
-------------
1. Add to the require section of your composer.json file:
    <pre>
       {
            "require": {
                "panix/mod-google-shopping": "dev-master"
            }
       }
    </pre>
2. run 
    <pre>
      php composer update
    </pre>

3. run migrate
    <pre>
    php yii migrate/up --migrationPath=@vendor/panix/mod-google-shopping/migrations
    </pre>

4. setup module
    ```php
    'modules' => [
            'googleshopping' => [
                'class' => 'panix\mod\google\\shopping\Module',
            ],
        ],
    ```

Thats all!


