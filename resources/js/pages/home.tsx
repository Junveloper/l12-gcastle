import Header from '@/domains/home/components/header';
import HeroSection from '@/domains/home/components/hero-section';
import { Price } from '@/domains/price/types';
import { PublicLayout } from '@/layouts/public-layout';
import { Head } from '@inertiajs/react';

type HomeProps = {
    prices: Price[];
};

export default function Home({ prices }: HomeProps) {
    console.log(prices);
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
            </PublicLayout>
        </>
    );
}
