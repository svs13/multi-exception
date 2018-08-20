MultiException
==============

Этот репозиторий содержит библиотеку классов, реализующих концепцию "мультиисключение"

Применение
----------

Если Вам необходимо реализовать мультиисключение, Вы можете воспользоваться следующим примером:

```php
<?php

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
        throw $errors; //кинуть это можем, т.к. наследовали от класса Exception
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

