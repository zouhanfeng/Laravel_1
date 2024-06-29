<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChannelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function generateRandomString($length = 10) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function generateRandomName() {
        $first_name = $this->generateRandomString(rand(2, 15));
        $first_name = strtolower($first_name);
        $first_name = ucfirst($first_name);
        $last_name = $this->generateRandomString(rand(2, 15));
        $last_name = strtolower($last_name);
        $last_name = ucfirst($last_name);
        $name = $first_name . " ". $last_name;
        return $name;
    }
    public function generateRandomcategory() {
    $category = [
        '教育類','娛樂類','生活類','色情類','魚類'
    ];
    return $category[rand(0, count($category)-1)];
    }
    public function generateRandomState() {
        $state = [
            '亞洲','美洲','歐洲','非洲'
        ];
        return $state[rand(0, count($state)-1)];
    }
    public function generateRandomfans() {

        $fans=rand(1000,9000);


        return $fans;
    }
    public function generateRandomview() {

        $view=rand(1000,900);
        return $view;
    }

    public function run()
    {
        for ($i=0; $i<25; $i++) {
            $name = $this->generateRandomName();
            $category = $this->generateRandomcategory();
            $fans = $this->generateRandomfans(). "萬";
            $views = $this->generateRandomview(). "萬";
            $state = $this->generateRandomState();
            $random_datetime = Carbon::now()->subMinutes(rand(1, 55));

            DB::table('channels')->insert([
                'c_name' => $name,
                'category' => $category,
                'fans' => $fans,
                'views' => $views,
                'state' => $state,
                'created_at' => $random_datetime,
                'updated_at' => $random_datetime
            ]);
        }
    }

}
