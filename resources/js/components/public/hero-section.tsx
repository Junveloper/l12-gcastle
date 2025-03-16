import heroImage from '@/images/hero_image.jpg';

export default function HeroSection() {
    return (
        <div className="h-[500px] border bg-cover bg-center" style={{ backgroundImage: `url(${heroImage})` }}>
            <div className="flex h-full w-full flex-col bg-zinc-950/70">
                <div className="my-auto w-full space-y-16 py-4 backdrop-blur-sm">
                    <h2 className="text-center text-3xl font-bold tracking-wider text-white uppercase">Welcome to G Castle</h2>

                    <div className="px-2 text-center text-5xl leading-snug text-white">Some Description</div>
                </div>
            </div>
        </div>
    );
}
