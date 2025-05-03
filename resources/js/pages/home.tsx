import { Separator } from '@/components/ui/separator';
import ContactUsSection from '@/domains/home/components/contact-us-section';
import Footer from '@/domains/home/components/footer';
import FrequentlyAskedQuestionsSection from '@/domains/home/components/frequently-asked-questions-section';
import GameListSection from '@/domains/home/components/game-list-section';
import Header from '@/domains/home/components/header';
import HeroSection from '@/domains/home/components/hero-section';
import ModalComponent from '@/domains/home/components/modal-component';
import PriceSection from '@/domains/home/components/price-section';
import { BusinessKeyValue, FrequentlyAskedQuestion, GameList, Modal, Price } from '@/domains/home/types';
import { PublicLayout } from '@/layouts/public-layout';
import { Head } from '@inertiajs/react';
import { useEffect, useState } from 'react';

type HomeProps = {
    prices: Price[];
    gameList: GameList;
    frequentlyAskedQuestions: FrequentlyAskedQuestion[];
    businessKeyValues: BusinessKeyValue[];
    modal?: Modal;
};

export default function Home({ prices, gameList, frequentlyAskedQuestions, businessKeyValues, modal }: HomeProps) {
    const [isModalOpen, setIsModalOpen] = useState(false);

    useEffect(() => {
        if (modal) {
            setIsModalOpen(true);
        }
    }, [modal]);

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
                    <FrequentlyAskedQuestionsSection frequentlyAskedQuestions={frequentlyAskedQuestions} />
                    <Separator className="bg-gcastle-blue" />
                    <ContactUsSection businessKeyValues={businessKeyValues} />
                    <Separator className="bg-white" />
                    <Footer />
                </main>
                {modal && <ModalComponent modal={modal} isOpen={isModalOpen} onOpenChange={setIsModalOpen} />}
            </PublicLayout>
        </>
    );
}
