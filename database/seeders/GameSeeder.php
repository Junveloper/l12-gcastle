<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Platform;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        $gamesByPlatform = [
            'Steam' => [
                'Apex Legends',
                'Baldur\'s Gate 3',
                'Cities: Skylines',
                'Counter-Strike 2',
                'Dark and Darker',
                'Dead by Daylight',
                'Destiny 2',
                'Dota 2',
                'EA SPORTS FC™ 24',
                'Grand Theft Auto V',
                'HELLDIVERS™ 2',
                'Marvel Rivals',
                'NARAKA: BLADEPOINT',
                'NBA 2K23',
                'NBA 2K24',
                'PUBG: BATTLEGROUNDS',
                'Paladins',
                'Path of Exile 2',
                'Path of Exiles',
                'Phasmophobia',
                'Rust',
                'SMITE',
                'THE FINALS',
                'Team Fortress 2',
                'Tom Clancy\'s Rainbow Six® Siege',
            ],
            'Riot Client' => [
                'League of Legends',
                'Legends of Runeterra',
                'Valorant',
            ],
            'Epic Games Launcher' => [
                'Fall Guys',
                'Fortnite',
                'Rocket League',
            ],
            'Battle.Net' => [
                'Call of Duty: Modern Warfare (Warzone)',
                'Heroes of the Storm',
                'Overwatch 2',
                'Starcraft',
                'Starcraft II',
                'World of Warcraft',
            ],
            'Others' => [
                'Escape from Tarkov',
                'Genshin Impact',
                'Guild Wars 2',
                'Minecraft',
                'Roblox',
                'RuneLite',
                'osu!',
                '리그오브레전드 (한국 서버)',
                '메이플스토리',
                '피파 온라인4',
            ],
            'Programs' => [
                'Discord',
                'LibreOffice Suite',
                'Spotify',
            ],
        ];

        $platforms = Platform::all()->keyBy('name');

        foreach ($gamesByPlatform as $platformName => $games) {
            $platform = $platforms->get($platformName);

            if (! $platform) {
                continue;
            }

            foreach ($games as $gameName) {
                Game::factory()
                    ->forPlatform($platform)
                    ->create([
                        'name' => $gameName,
                    ]);
            }
        }
    }
}
