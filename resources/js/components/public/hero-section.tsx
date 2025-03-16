import heroImage from '@/images/hero_image.jpg';
import { Separator } from '../ui/separator';

export default function HeroSection() {
    return (
        <div className="h-[400px] bg-cover bg-center" style={{ backgroundImage: `url(${heroImage})` }}>
            <div className="flex h-full w-full flex-col bg-zinc-950/70">
                <div className="my-auto flex w-full flex-col items-center space-y-10 py-6 backdrop-blur-sm">
                    <div className="font-arcade text-center text-5xl font-bold tracking-wide text-white uppercase">
                        Descend into the Gaming Dungeon
                    </div>

                    <div className="w-30">
                        <Separator className="w-30" />
                    </div>

                    <div className="max-w-md space-y-4 text-center text-base font-light text-white">
                        <p>A modern-day arcade where 67 gaming PCs await you</p>
                        <p>Right in the heart of Brisbane City</p>
                    </div>
                </div>
            </div>
        </div>
    );
}
