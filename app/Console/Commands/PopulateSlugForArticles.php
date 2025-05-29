<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Artikel;
use Illuminate\Support\Str;

class PopulateSlugForArticles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'articles:populate-slug';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate the slug column for existing articles';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Populating slugs for articles...');

        Artikel::all()->each(function ($artikel) {
            if (empty($artikel->slug)) {
                $artikel->slug = Str::slug($artikel->judul);
                $artikel->save();
                $this->info("Slug generated for article ID: {$artikel->id}");
            }
        });

        $this->info('Slugs populated successfully.');
    }
}
