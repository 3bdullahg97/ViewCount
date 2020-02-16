# ViewCount

The package enables you to calculate the view count of a resource (MongoDB Collection).

## Installation

1. Via Composer

``` bash
$ composer require luqta/viewcount
```

2. Validate `vistor_ip`

```
'countable' => 'required|boolean',
'vistor_ip' => 'required_if:countable,1|string',
'user_agent' => 'required_if:countable,1|string',
'browser_language' => 'required_if:countable,1|string',
'screen.width' => 'required_if:countable,1|numeric',
'screen.height' => 'required_if:countable,1|numeric',
'inner.width' => 'required_if:countable,1|numeric',
'inner.height' => 'required_if:countable,1|numeric',
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
