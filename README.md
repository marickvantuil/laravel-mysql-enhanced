# Enhance MySQL for Laravel with new features 

The package currently only adds support for lateral joins which is something I needed but the idea is similar to Tobias Petry's package: [Laravel Postgres Enhanced](https://github.com/tpetry/laravel-postgresql-enhanced).

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
