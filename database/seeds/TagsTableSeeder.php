<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['qualcosa', 'sono un tag', 'piatto bello', 'piatto brutto', 'yayaya sono Lorde'];
        for($i = 0; $i < count($tags); $i++){
                $newTag = new Tag();
                $newTag->name = $tags[$i];
                $newTag->slug = Str::of($tags[$i])->slug('-');
                $newTag->save();
        }
    }
}
