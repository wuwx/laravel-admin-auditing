Laravel Admin Auditing Extension
======

## 安装

```composer require wuwx/laravel-admin-auditing```

```bash
php artisan migrate
php artisan admin:import auditing
```

## 配置

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Type extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    //
}
```

## 使用

```http://laravel-admin.test/admin/auditing```
