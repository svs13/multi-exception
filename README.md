MultiException
==============

Этот репозиторий содержит библиотеку классов, реализующих концепцию "мультиисключение"

Применение
----------

Пример реализации:

```php
<?php

require __DIR__ . '/vendor/autoload.php';

use Svs13\MultiException;

function validate($password)
{
    $errors = new MultiException();

    if (false === strpos($password, '0')) {
        $errors->add(new Exception('Нет цифры 0!'));
    }
    if (strlen($password)<6) {
        $errors->add(new Exception('Слишком короткий пароль'));
    }

    if (!$errors->empty()) {
        throw $errors;
    }
}

try {
    validate('123');
} catch (MultiException $errors) {
    foreach ($errors->getAll() as $error) {
        echo $error->getMessage() . "\n";
    }
}

```

