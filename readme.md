# ViewCount

The package enables you to calculate the view count of a resource (MongoDB Collection).

## Installation

1. Via Composer

``` bash
$ composer require luqta/viewcount
```

2. Validate `vistor_ip`

```
'vistor_ip' => 'required|ip'
```

3. Add `view_count` field to your resource collection.

```
protected $fillable = [
    ...
    'view_count',
    ...
];
```

4. Dispatch `Luqta\ViewCount\ViewCountJob` job in your resource controller.

```
dispatch(new ViewCountJob($model, $vistorIp));
```

5. Use `Luqta\ViewCount\Traits\Countable` trait in your resource model.