import Header from '@/components/public/header';
import { PublicLayout } from '@/layouts/public-layout';
import { Head } from '@inertiajs/react';

export default function Home() {
    return (
        <>
            <Head title="G-Castle Internet Cafe">
                <link rel="preconnect" href="https://fonts.googleapis.com" />
                <link rel="preconnect" href="https://fonts.gstatic.com" cross-origin />
                <link href="https://fonts.googleapis.com/css2?family=Jersey+15&display=swap" rel="stylesheet" />
            </Head>
            <PublicLayout>
                <Header />
            </PublicLayout>
        </>
    );
}
