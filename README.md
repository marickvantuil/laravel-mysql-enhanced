# Enhance MySQL for Laravel with new features 

[![Latest Version on Packagist](https://img.shields.io/packagist/v/marick/laravel-mysql-enhanced.svg)](https://packagist.org/packages/marick/laravel-mysql-enhanced)
[![Tests](https://github.com/marickvantuil/laravel-mysql-enhanced/actions/workflows/run-tests.yml/badge.svg)](https://github.com/marickvantuil/laravel-mysql-enhanced/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/marick/laravel-mysql-enhanced.svg)](https://packagist.org/packages/marick/laravel-mysql-enhanced)

The package currently only adds support for lateral joins which is something I needed but the idea is similar to Tobias Petry's package: [Laravel Postgres Enhanced](https://github.com/tpetry/laravel-postgresql-enhanced).

Feel free to make a PR to add more features.

## Installation

```
composer require marick/laravel-mysql-enhanced
```

## Features

### Lateral joins

Available methods: `joinSubLateral`, `leftJoinSubLateral`

```php
User::select('users.email', 'posts.*')
    ->joinSubLateral(
        Post::whereColumn('posts.user_id', 'users.id')
            ->orderBy('price', 'desc')
            ->limit(3),
        'posts',
)
```

```sql
SELECT
    users.email,
    posts.*
FROM
    users
        
    INNER JOIN LATERAL (
        SELECT *
        FROM posts
        WHERE posts.user_id = users.id
        ORDER BY price DESC
        LIMIT 3
    ) as posts on true
    
```
