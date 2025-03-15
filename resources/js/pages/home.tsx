import Header from '@/components/public/header';
import { PublicLayout } from '@/layouts/public-layout';
import { Head } from '@inertiajs/react';

export default function Home() {
    return (
        <>
            <Head title="G-Castle Internet Cafe"></Head>
            <PublicLayout>
                <Header />
            </PublicLayout>
        </>
    );
}
