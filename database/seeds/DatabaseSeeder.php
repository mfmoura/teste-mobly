<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
              ['name'=>'Admin', 'email' => 'admin@admin.com', 'password' => bcrypt("admin123"), 'level' => '1'],
              ['name'=>'User', 'email' => 'user@user.com', 'password' => bcrypt("user123"), 'level' => '0']
            ]
        );

        DB::table('categorias')->insert([
              ['nome'=>'Categoria 1'],
              ['nome'=>'Categoria 2'],
              ['nome'=>'Categoria 3'],
              ['nome'=>'Categoria 4'],
              ['nome'=>'Categoria 5'],
              ['nome'=>'Categoria 6']
        ]);

        DB::table('produtos')->insert(array(
          array( // row #0
            'nome' => 'Quo aliquam quis atque quod voluptas pariatur Corporis autem cupidatat qui officiis laborum sed non voluptatibus ad repellendus',
            'descricao' => 'Excepteur id minima enim ipsam ut dolor pariatur Labore culpa asperiores alias nisi cum totam qui',
            'imagem' => NULL,
            'preço' => 1651.65,
            'created_at' => '2018-03-26 07:42:41',
            'updated_at' => '2018-03-26 07:42:41',
          ),
          array( // row #1
            'nome' => 'Harum illum id rerum sunt ut harum enim cum velit',
            'descricao' => 'Consectetur perferendis excepturi distinctio Exercitation dolores quidem odit voluptatem Expedita rerum nobis est',
            'imagem' => NULL,
            'preço' => 166515.61,
            'created_at' => '2018-03-26 07:42:55',
            'updated_at' => '2018-03-26 07:42:55',
          ),
          array( // row #2
            'nome' => 'Perspiciatis eu sunt ut est provident quia autem voluptate est do sit quasi nulla quas est vero et',
            'descricao' => 'Atque occaecat ratione exercitation ad rerum officia possimus neque commodi provident veniam ducimus',
            'imagem' => NULL,
            'preço' => 11516.51,
            'created_at' => '2018-03-26 07:43:09',
            'updated_at' => '2018-03-26 07:43:09',
          ),
          array( // row #3
            'nome' => 'Accusantium ullamco similique vero quaerat corrupti asperiores sit sequi quia blanditiis autem',
            'descricao' => 'Tempore facilis sint nemo quia ratione voluptatem est suscipit quia rerum dolores voluptas duis laboriosam delectus sint',
            'imagem' => NULL,
            'preço' => 488.48,
            'created_at' => '2018-03-26 07:43:24',
            'updated_at' => '2018-03-26 07:43:24',
          ),
          array( // row #4
            'nome' => 'Rerum est occaecat voluptatem illum accusantium',
            'descricao' => 'Minus autem reiciendis esse repellendus Voluptas qui possimus aut ex odio mollit ad praesentium sed recusandae Ut aut quod',
            'imagem' => NULL,
            'preço' => 894.84,
            'created_at' => '2018-03-26 07:43:40',
            'updated_at' => '2018-03-26 07:43:40',
          ),
          array( // row #5
            'nome' => 'Lorem fugiat iste eligendi rerum ab est et mollitia odio explicabo Nobis suscipit error',
            'descricao' => 'Lorem dolor sed possimus sunt',
            'imagem' => NULL,
            'preço' => 784.56,
            'created_at' => '2018-03-26 07:44:06',
            'updated_at' => '2018-03-26 07:44:06',
          ),
          array( // row #6
            'nome' => 'Molestiae est soluta facilis neque duis eius dolorem sunt ea doloremque dolor odio similique',
            'descricao' => 'Non asperiores error error vel consequatur Quis reiciendis nulla et',
            'imagem' => NULL,
            'preço' => 94.48,
            'created_at' => '2018-03-26 07:44:22',
            'updated_at' => '2018-03-26 07:44:22',
          ),
          array( // row #7
            'nome' => 'Sunt ut labore qui corporis iusto mollitia quibusdam est sapiente illum',
            'descricao' => 'Repudiandae dolor sunt culpa nisi',
            'imagem' => NULL,
            'preço' => 84.89,
            'created_at' => '2018-03-26 07:44:43',
            'updated_at' => '2018-03-26 07:44:43',
          ),
          array( // row #8
            'nome' => 'Minus nostrum est aut reiciendis sequi dolor quia nihil in aute deserunt placeat officia',
            'descricao' => 'In quo ipsum deserunt qui velit cillum nisi vero et ut exercitation incidunt fugiat est totam',
            'imagem' => NULL,
            'preço' => 16515.61,
            'created_at' => '2018-03-26 07:45:02',
            'updated_at' => '2018-03-26 07:45:02',
          ),
          array( // row #9
            'nome' => 'Tempora quia deserunt assumenda duis voluptas',
            'descricao' => 'Non qui amet labore minima voluptatum est vero voluptas sed dolores',
            'imagem' => NULL,
            'preço' => 8894.22,
            'created_at' => '2018-03-26 07:45:26',
            'updated_at' => '2018-03-26 07:45:26',
          ),
          array( // row #10
            'nome' => 'Aut dolore quae ea magnam minus culpa voluptatibus dolor sed cillum quod quia quia atque',
            'descricao' => 'Elit laborum incidunt quia aut voluptas maxime expedita incididunt perferendis',
            'imagem' => NULL,
            'preço' => 51.41,
            'created_at' => '2018-03-26 07:45:43',
            'updated_at' => '2018-03-26 07:45:43',
          ),

        )
      );

      DB::table('produto_categoria')->insert(array(
          array( // row #0
            'categoria' => 1,
            'produto' => 1,
          ),
          array( // row #1
            'categoria' => 1,
            'produto' => 2,
          ),
          array( // row #2
            'categoria' => 1,
            'produto' => 3,
          ),
          array( // row #3
            'categoria' => 1,
            'produto' => 6,
          ),
          array( // row #4
            'categoria' => 1,
            'produto' => 7,
          ),
          array( // row #5
            'categoria' => 2,
            'produto' => 3,
          ),
          array( // row #6
            'categoria' => 2,
            'produto' => 4,
          ),
          array( // row #7
            'categoria' => 2,
            'produto' => 7,
          ),
          array( // row #8
            'categoria' => 2,
            'produto' => 8,
          ),
          array( // row #9
            'categoria' => 2,
            'produto' => 10,
          ),
          array( // row #10
            'categoria' => 3,
            'produto' => 3,
          ),
          array( // row #11
            'categoria' => 3,
            'produto' => 4,
          ),
          array( // row #12
            'categoria' => 3,
            'produto' => 5,
          ),
          array( // row #13
            'categoria' => 3,
            'produto' => 6,
          ),
          array( // row #14
            'categoria' => 3,
            'produto' => 7,
          ),
          array( // row #15
            'categoria' => 3,
            'produto' => 9,
          ),
          array( // row #16
            'categoria' => 3,
            'produto' => 10,
          ),
          array( // row #17
            'categoria' => 3,
            'produto' => 11,
          ),
          array( // row #18
            'categoria' => 4,
            'produto' => 2,
          ),
          array( // row #19
            'categoria' => 4,
            'produto' => 4,
          ),
          array( // row #20
            'categoria' => 4,
            'produto' => 6,
          ),
          array( // row #21
            'categoria' => 4,
            'produto' => 7,
          ),
          array( // row #22
            'categoria' => 4,
            'produto' => 11,
          ),
          array( // row #23
            'categoria' => 5,
            'produto' => 1,
          ),
          array( // row #24
            'categoria' => 5,
            'produto' => 2,
          ),
          array( // row #25
            'categoria' => 5,
            'produto' => 5,
          ),
          array( // row #26
            'categoria' => 5,
            'produto' => 8,
          ),
          array( // row #27
            'categoria' => 5,
            'produto' => 9,
          ),
          array( // row #28
            'categoria' => 5,
            'produto' => 10,
          ),
          array( // row #29
            'categoria' => 5,
            'produto' => 11,
          ),
          array( // row #30
            'categoria' => 6,
            'produto' => 3,
          ),
          array( // row #31
            'categoria' => 6,
            'produto' => 6,
          ),
          array( // row #32
            'categoria' => 6,
            'produto' => 7,
          ),
          array( // row #33
            'categoria' => 6,
            'produto' => 8,
          ),
          array( // row #34
            'categoria' => 6,
            'produto' => 9,
          ),
          array( // row #35
            'categoria' => 6,
            'produto' => 10,
          ),
        )
      );

    }
}
