<?php

namespace Database\Seeders;

use App\Domains\Game\Models\Game;
use App\Domains\Platform\Models\Platform;
use Illuminate\Database\Seeder;

use function Pest\Laravel\seed;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        $gamesByPlatform = [
            'Steam' => [
                [
                    'name' => 'Apex Legends',
                    'is_free' => true,
                ],
                [
                    'name' => 'Baldur\'s Gate 3',
                    'is_free' => false,
                ],
                [
                    'name' => 'Cities: Skylines',
                    'is_free' => false,
                ],
                [
                    'name' => 'Counter-Strike 2',
                    'is_free' => true,
                ],
                [
                    'name' => 'Dark and Darker',
                    'is_free' => true,
                ],
                [
                    'name' => 'Dead by Daylight',
                    'is_free' => false,
                ],
                [
                    'name' => 'Destiny 2',
                    'is_free' => true,
                ],
                [
                    'name' => 'Dota 2',
                    'is_free' => true,
                ],
                [
                    'name' => 'EA SPORTS FC™ 24',
                    'is_free' => false,
                ],
                [
                    'name' => 'Grand Theft Auto V',
                    'is_free' => false,
                ],
                [
                    'name' => 'HELLDIVERS™ 2',
                    'is_free' => false,
                ],
                [
                    'name' => 'Marvel Rivals',
                    'is_free' => true,
                ],
                [
                    'name' => 'NARAKA: BLADEPOINT',
                    'is_free' => false,
                ],
                [
                    'name' => 'NBA 2K23',
                    'is_free' => false,
                ],
                [
                    'name' => 'NBA 2K24',
                    'is_free' => false,
                ],
                [
                    'name' => 'PUBG: BATTLEGROUNDS',
                    'is_free' => true,
                ],
                [
                    'name' => 'Paladins',
                    'is_free' => true,
                ],
                [
                    'name' => 'Path of Exile 2',
                    'is_free' => false,
                ],
                [
                    'name' => 'Path of Exiles',
                    'is_free' => true,
                ],
                [
                    'name' => 'Phasmophobia',
                    'is_free' => false,
                ],
                [
                    'name' => 'Rust',
                    'is_free' => false,
                ],
                [
                    'name' => 'SMITE',
                    'is_free' => true,
                ],
                [
                    'name' => 'THE FINALS',
                    'is_free' => true,
                ],
                [
                    'name' => 'Team Fortress 2',
                    'is_free' => true,
                ],
                [
                    'name' => 'Tom Clancy\'s Rainbow Six® Siege',
                    'is_free' => false,
                ],
            ],
            'Riot Client' => [
                [
                    'name' => 'League of Legends',
                    'is_free' => true,
                ],
                [
                    'name' => 'Legends of Runeterra',
                    'is_free' => true,
                ],
                [
                    'name' => 'Valorant',
                    'is_free' => true,
                ],
            ],
            'Epic Games Launcher' => [
                [
                    'name' => 'Fall Guys',
                    'is_free' => true,
                ],
                [
                    'name' => 'Fortnite',
                    'is_free' => true,
                ],
                [
                    'name' => 'Rocket League',
                    'is_free' => true,
                ],
            ],
            'Battle.Net' => [
                [
                    'name' => 'Call of Duty: Modern Warfare (Warzone)',
                    'is_free' => true,
                ],
                [
                    'name' => 'Heroes of the Storm',
                    'is_free' => true,
                ],
                [
                    'name' => 'Overwatch 2',
                    'is_free' => true,
                ],
                [
                    'name' => 'Starcraft',
                    'is_free' => true,
                ],
                [
                    'name' => 'Starcraft II',
                    'is_free' => true,
                ],
                [
                    'name' => 'World of Warcraft',
                    'is_free' => false,
                ],
            ],
            'Others' => [
                [
                    'name' => 'Escape from Tarkov',
                    'is_free' => false,
                ],
                [
                    'name' => 'Genshin Impact',
                    'is_free' => true,
                ],
                [
                    'name' => 'Guild Wars 2',
                    'is_free' => false,
                ],
                [
                    'name' => 'Minecraft',
                    'is_free' => false,
                ],
                [
                    'name' => 'Roblox',
                    'is_free' => true,
                ],
                [
                    'name' => 'RuneLite',
                    'is_free' => true,
                ],
                [
                    'name' => 'osu!',
                    'is_free' => true,
                ],
                [
                    'name' => '리그오브레전드 (한국 서버)',
                    'is_free' => true,
                ],
                [
                    'name' => '메이플스토리',
                    'is_free' => true,
                ],
                [
                    'name' => '피파 온라인4',
                    'is_free' => true,
                ],
            ],
            'Programs' => [
                [
                    'name' => 'Discord',
                    'is_free' => true,
                ],
                [
                    'name' => 'LibreOffice Suite',
                    'is_free' => true,
                ],
                [
                    'name' => 'Spotify',
                    'is_free' => false,
                ],
            ],
        ];

        if (Platform::query()->count() === 0) {
            seed(PlatformSeeder::class);
        }

        $platforms = Platform::all()->keyBy('name');

        foreach ($gamesByPlatform as $platformName => $games) {
            $platform = $platforms->get($platformName);

            if (! $platform) {
                continue;
            }

            foreach ($games as $gameData) {
                Game::factory()
                    ->forPlatform($platform)
                    ->create([
                        'name' => $gameData['name'],
                        'is_free' => $gameData['is_free'],
                    ]);
            }
        }
    }
}
