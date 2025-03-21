import Header from '@/domains/home/components/header';
import HeroSection from '@/domains/home/components/hero-section';
import PriceSection from '@/domains/home/components/price-section';
import { Price } from '@/domains/price/types';
import { PublicLayout } from '@/layouts/public-layout';
import { Head } from '@inertiajs/react';

type HomeProps = {
    prices: Price[];
};

export default function Home({ prices }: HomeProps) {
    return (
        <>
            <Head title="G-Castle Internet Cafe">
                <link rel="preconnect" href="https://fonts.googleapis.com" />
                <link rel="preconnect" href="https://fonts.gstatic.com" cross-origin />
                <link href="https://fonts.googleapis.com/css2?family=Jersey+15&display=swap" rel="stylesheet" />
            </Head>
            <PublicLayout>
                <Header />
                <HeroSection />
                <main className="mx-auto flex h-full w-full max-w-7xl flex-1 flex-col gap-4 rounded-xl">
                    <PriceSection prices={prices} />
                </main>
            </PublicLayout>
        </>
    );
}
