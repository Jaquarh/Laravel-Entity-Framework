# Laravel Entity Framework
Entity Framework, C#, makes working with models easy. We re-designed the basic concepts of Entity in Laravel for PHP.

# Setting up your enviroment
```php
use \App\IezonHelper;

IezonHelper::getInstance()->setTable('myTable')->setReference($myModel);
```

# Making your first call
```php
use \App\IezonHelper;

IezonHelper::getInstance()->setTable('myTable')->setReference($myModel);
foreach(IezonHelper::getInstance()->fetch()->all() as $myModel) {
    $myModel->itemToChange = 'foo';
    IezonHelper::getInstance()->where(['id' => $myModel->id])->saveModel();
}
```

# Other preinstalled methods you can use
```php
IezonHelper::getInstance()->where(['foo' => 'bar'])->fetch(); # Allows where clauses
IezonHelper::getInstance()->saveModel(); # Saves as a new row
```

# We will keep pushing out new updates which allows for more `Illuminate\Support\Facades\DB` methods to be utilised in this helper.
