import { Alert, AlertDescription } from '@/components/ui/alert';
import { Badge } from '@/components/ui/badge';
import { Game, GameList } from '@/domains/home/types';
import { cn } from '@/lib/utils';
import { formatDate, isAfter, subDays } from 'date-fns';

type GameListSectionProps = {
    gameList: GameList;
};

export default function GameListSection({ gameList }: GameListSectionProps) {
    const platforms = gameList.platforms;

    const platformWithTheMostGames = [...platforms].sort((a, b) => b.relations.games.length - a.relations.games.length)[0];

    function isRecentlyAddedGame(game: Game) {
        const gameAddedAt = game.createdAt;
        const fourteenDaysAgo = subDays(new Date(), 14);

        return isAfter(gameAddedAt, fourteenDaysAgo);
    }

    return (
        <div className="mx-auto flex w-full flex-col space-y-4 px-2 py-28 lg:max-w-5xl">
            <h2 className="font-arcade text-foreground gcastle-text-shadow text-center text-5xl font-bold tracking-wider uppercase">Game List</h2>

            <p className="mx-auto max-w-sm px-4 text-center text-sm leading-8 md:max-w-xl">
                Last Updated: {formatDate(gameList.lastUpdated, 'd MMMM yyyy')}
            </p>

            <p className="mx-auto my-4 max-w-sm px-4 text-center text-base leading-8 md:max-w-xl">
                We have variety of games pre-installed on our PCs. If you have a game that you'd like us to pre-install, please let us know.
            </p>

            <Alert className="mx-auto my-4 max-w-md md:max-w-3xl">
                <AlertDescription className="flex justify-center text-center">
                    <p>
                        Games that are not marked as <Badge variant="secondary">Free</Badge> require a separate license purchase from the platform
                        (e.g. Steam).
                    </p>
                </AlertDescription>
            </Alert>

            <div className="mx-auto mt-6 grid grid-cols-1 gap-16 md:grid-cols-2 md:gap-x-6 md:gap-y-10">
                {platforms.map((platform) => (
                    <div key={platform.id} className={cn('px-6', platform.id === platformWithTheMostGames.id && 'row-span-6')}>
                        <h3 className="text-foreground mb-6 text-left text-2xl font-black tracking-wide md:text-left">{platform.name}</h3>
                        <ul className="space-y-2">
                            {platform.relations.games.map((game) => (
                                <li key={game.id} className="text-foreground flex items-center space-x-2 text-sm md:justify-start">
                                    <span>
                                        {game.name} {isRecentlyAddedGame(game) && <span className="text-muted-foreground text-xs">(New)</span>}
                                    </span>
                                    {game.isFree && <Badge variant="secondary">Free</Badge>}
                                </li>
                            ))}
                        </ul>
                    </div>
                ))}
            </div>
        </div>
    );
}
