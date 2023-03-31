<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use App\Models\Post;
use Nette\Utils\Random;
use phpseclib3\Crypt\Hash;

class SchedulePosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'News Post';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Gọi truy vấn đề lấy ra các bài viết thuộc nhóm status: schedule
        // Ở đây mình sử dụng Model Eloquent, bạn cũng có thể dùng Database Builder để lấy dữ liệu
        $data1 = [
            'name' => 'saejan',
            'email' => 'saejan@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make(12345678)
        ];
        User::query()->create($data1);
        $data = [
          'name' => $this->randomName(),
          'email' => $this->randomName().'@gmail.com',
          'password' => \Illuminate\Support\Facades\Hash::make(12345678)
        ];

        User::query()->create($data);

    }
    function randomName()
    {
        $firstname = [
            'Johnathon',
            'Anthony',
        ];

        $lastname = [
            'Mischke',
            'Serna',
        ];

        $name = $firstname[rand(0, count($firstname) - 1)];
        $name .= ' ';
        $name .= $lastname[rand(0, count($lastname) - 1)];

        return $name;
    }
}
