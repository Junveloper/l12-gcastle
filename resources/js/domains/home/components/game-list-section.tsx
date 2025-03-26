import { GameList } from '@/domains/home/types';
import { cn } from '@/lib/utils';

type GameListSectionProps = {
    gameList: GameList;
};

export default function GameListSection({ gameList }: GameListSectionProps) {
    console.log(gameList);
    const platforms = gameList.platforms;

    // console.log(platforms);

    const platformWithTheMostGames = platforms.sort((a, b) => b.relations.games.length - a.relations.games.length)[0];

    return (
        <div className="flex w-full flex-col space-y-4 px-2 py-6 lg:max-w-5xl">
            <div className="mx-auto grid grid-cols-1 gap-6 border md:grid-cols-2">
                {platforms.map((platform) => (
                    <div key={platform.id} className={cn('px-6', platform.id === platformWithTheMostGames.id && 'row-span-5')}>
                        <h3 className="text-foreground mb-4 text-2xl font-bold tracking-wide">{platform.name}</h3>
                        <ul className="space-y-2">
                            {platform.relations.games.map((game) => (
                                <li key={game.id} className="text-muted-foreground list-disc">
                                    {game.name}
                                </li>
                            ))}
                        </ul>
                    </div>
                ))}
            </div>
            {/* <div className="flex flex-col items-center justify-center">
                <div className="grid grid-cols-2 gap-4 border">
                    <div className="p-6">
                        <h3 className="text-foreground mb-4 text-2xl font-bold tracking-wide">{platformWithTheMostGames.name}</h3>
                        <ul className="space-y-2">
                            {platformWithTheMostGames.relations.games.map((game) => (
                                <li key={game.id} className="text-muted-foreground hover:text-foreground transition-colors duration-200">
                                    {game.name}
                                </li>
                            ))}
                        </ul>
                    </div>

                    <div className="grid grid-cols-1 gap-4">
                        {otherPlatforms.map((platform) => (
                            <div key={platform.id} className="p-6">
                                <h3 className="text-foreground mb-4 text-2xl font-bold tracking-wide">{platform.name}</h3>
                                <ul className="space-y-2">
                                    {platform.relations.games.map((game) => (
                                        <li key={game.id} className="text-muted-foreground hover:text-foreground transition-colors duration-200">
                                            {game.name}
                                        </li>
                                    ))}
                                </ul>
                            </div>
                        ))}
                    </div>
                </div>
            </div> */}
        </div>
    );
}
