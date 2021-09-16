<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;

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
        $posts = Post::where("status_schedule", "schedule")->get();
        $posts->each(function ($item) {
            // Kiểm tra các $item article nếu thời gian nhỏ hơn hoặc bằng hiện tại
            // => publish
            if ($item->publish_at <= now()) {
                $item->status_schedule = "public";
                // Lưu lại
                $item->save();
            }
        });
    }
}
