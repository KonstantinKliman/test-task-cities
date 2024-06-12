<?php

namespace App\Console\Commands;

use App\Models\City;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ParseCities extends Command
{
    protected $signature = 'parse:cities';

    protected $description = 'Parse cities from API';

    public function handle()
    {
        $responseRu = Http::get('https://api.hh.ru/areas');
        $regionsRu = $responseRu->json()[0]['areas'];
        $citiesRu = [];
        foreach ($regionsRu as $region) {
            if (empty($region['areas'])) {
                $citiesRu[$region['id']] = $region['name'];
            }
            foreach ($region['areas'] as $city) {
                $citiesRu[$city['id']] = $city['name'];
            }
        }

        $responseEn = Http::get('https://api.hh.ru/areas?locale=EN');
        $regionsEn = $responseEn->json()[0]['areas'];
        $citiesEn = [];
        foreach ($regionsEn as $region) {
            if (empty($region['areas'])) {
                $citiesEn[$region['id']] = $region['name'];
            }
            foreach ($region['areas'] as $city) {
                $citiesEn[$city['id']] = $city['name'];
            }
        }

        $cities = [];

        foreach ($citiesRu as $key => $name) {
            if (isset($citiesEn[$key])) {
                $slug = Str::slug($citiesEn[$key]);
                $cities[] = ['name' => $name, 'slug' => $slug];
            }
        }

        foreach ($cities as $city) {
            $originalSlug = $city['slug'];
            $slug = $originalSlug;
            $counter = 1;

            while (City::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            $city['slug'] = $slug;

            City::updateOrCreate(
                ['slug' => str_replace(' ', '-', $city['slug'])],
                ['name' => $city['name']]
            );
        }

        $this->info('Cities parsed and saved successfully.');
        return 1;
    }
}
