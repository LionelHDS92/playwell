<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // on récupère le nom de chaque fichier avec la méthode allFiles de la classe File
            $allFiles = File::allFiles(public_path('images'));

            foreach ($allFiles as $f) {
            File::delete($f); // supprime le fichier si il existe
        }    
        factory(App\Post::class,15)->create()->each(
            function ($post) {
                // supprimer tout ce qui se trouve dans le dossier images 
                    // File est une classe de Laravel elle va nous permettre d'enregistrer l'image dans un fichier
                    $uri = str_random(12) . '.jpg';
                    $file = file_get_contents('http://lorempicsum.com/futurama/500/500/' . rand(1, 9));
                    File::put(
                        public_path('images') . '/' . $uri,
                        $file
                    );
                $post->pictures()->create([
                    /* 'title' => 'futurama', */
                    'link' => $uri,
                    /* 'size' => filesize( public_path('images') . '/' . $uri ) */
                ]);
                $post->tags()->attach([
                    1,
                    2,
                    3,
                ]);
            }
        );
    }
}
