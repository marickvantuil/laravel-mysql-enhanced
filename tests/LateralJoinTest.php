<?php

declare(strict_types=1);

namespace Tests;

use Tests\Fixtures\Post;
use Tests\Fixtures\User;

class LateralJoinTest extends TestCase
{
    /**
     * @test
     */
    public function testJoinSubLateral(): void
    {
        $query = User::select('users.email', 'posts.*')
            ->joinSubLateral(
                Post::whereColumn('posts.user_id', 'users.id')
                    ->orderBy('price', 'desc')
                    ->limit(3),
                'posts',
            )
            ->toSql();

        $this->assertEquals(
            'select `users`.`email`, `posts`.* from `users` inner join lateral (select * from `posts` where `posts`.`user_id` = `users`.`id` order by `price` desc limit 3) as `posts` on true',
            $query
        );
    }

    /**
     * @test
     */
    public function testLeftJoinSubLateral(): void
    {
        $query = User::select('users.email', 'posts.*')
            ->leftJoinSubLateral(
                Post::whereColumn('posts.user_id', 'users.id')
                    ->orderBy('price', 'desc')
                    ->limit(3),
                'posts',
            )
            ->toSql();

        $this->assertEquals(
            'select `users`.`email`, `posts`.* from `users` left join lateral (select * from `posts` where `posts`.`user_id` = `users`.`id` order by `price` desc limit 3) as `posts` on true',
            $query
        );
    }
}
