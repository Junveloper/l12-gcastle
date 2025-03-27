import { Separator } from '@/components/ui/separator';
import GameListSection from '@/domains/home/components/game-list-section';
import Header from '@/domains/home/components/header';
import HeroSection from '@/domains/home/components/hero-section';
import PriceSection from '@/domains/home/components/price-section';
import { GameList, Price } from '@/domains/home/types';
import { PublicLayout } from '@/layouts/public-layout';
import { Head } from '@inertiajs/react';

type HomeProps = {
    prices: Price[];
    gameList: GameList;
};

export default function Home({ prices, gameList }: HomeProps) {
    return (
        <>
            <Head title="G-Castle Internet Cafe">
                <link rel="preconnect" href="https://fonts.googleapis.com" />
                <link rel="preconnect" href="https://fonts.gstatic.com" cross-origin />
                <link href="https://fonts.googleapis.com/css2?family=Jersey+15&display=swap" rel="stylesheet" />
            </Head>
            <PublicLayout>
                <Header />
                <Separator className="bg-white" />
                <HeroSection />
                <Separator className="bg-gcastle-blue" />
                <main>
                    <PriceSection prices={prices} />
                    <Separator className="bg-gcastle-pink" />
                    <GameListSection gameList={gameList} />
                    <Separator className="bg-white" />
                </main>
            </PublicLayout>
        </>
    );
}
