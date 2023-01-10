<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Vrsta;
use \App\Models\Proizvod;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //kako nse ne bi javljale greske kad dodajem dodatno jer imam unique
        User::truncate();
        Vrsta::truncate();
        Proizvod::truncate();


      $user= User::factory()->create();
      $user1= User::factory()->create();

       $vrsta1=Vrsta::factory()->create();
      $vrsta2=Vrsta::factory()->create();
      $vrsta3=Vrsta::factory()->create();
       $vrsta4=Vrsta::factory()->create();

       Proizvod::factory(2)->create(
        [
            'user_id'=>$user->id,
            'vrsta_id'=>$vrsta1->id,
        ]
       );
       Proizvod::factory(2)->create(
        [
            'user_id'=>$user->id,
            'vrsta_id'=>$vrsta2->id,
        ]
       );
       Proizvod::factory(2)->create(
        [
            'user_id'=>$user->id,
            'vrsta_id'=>$vrsta3->id,
        ]
       );
       Proizvod::factory(2)->create(
        [
            'user_id'=>$user->id,
            'vrsta_id'=>$vrsta4->id,
        ]
       );
//       $pr1=Proizvod::create(['sifra'=>'123',
//     'naziv'=>'Jabuka',
//     'prodajna_cena'=>'56',
//     'kupovna_cena'=>'68',
//     'stanje'=>'30',
//     'vrsta_id'=>$vrsta1->id,
//     'user_id'=>$user->id
// ]);
// $pr2=Proizvod::create(['sifra'=>'768',
// 'naziv'=>'Paradajz',
// 'prodajna_cena'=>'78',
// 'kupovna_cena'=>'98',
// 'stanje'=>'90',
// 'vrsta_id'=>$vrsta2->id,
// 'user_id'=>$user->id
// ]);
// $pr3=Proizvod::create(['sifra'=>'453',
// 'naziv'=>'Na eks',
// 'prodajna_cena'=>'89',
// 'kupovna_cena'=>'111',
// 'stanje'=>'90',
// 'vrsta_id'=>$vrsta3->id,
// 'user_id'=>$user->id
// ]);
// $pr4=Proizvod::create(['sifra'=>'987',
// 'naziv'=>'Cokolada-kakao',
// 'prodajna_cena'=>'156',
// 'kupovna_cena'=>'178',
// 'stanje'=>'38',
// 'vrsta_id'=>$vrsta4->id,
// 'user_id'=>$user->id
// ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
