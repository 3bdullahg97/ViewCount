# ViewCount

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.

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

4. Dispatch `ViewCountJob` in your resource controller.

```
dispatch(new ViewCountJob($model, $vistorIp));
```

## Credits

- [Abdullah Abdelqader][link-author]
- [All Contributors][link-contributors]