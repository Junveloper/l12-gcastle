import heroImage from '@/images/hero_image.jpg';
import { Separator } from '../ui/separator';

export default function HeroSection() {
    return (
        <div className="h-[500px] bg-cover bg-center" style={{ backgroundImage: `url(${heroImage})` }}>
            <div className="bg-background/70 flex h-full w-full flex-col">
                <div className="my-auto flex w-full flex-col items-center space-y-10 py-6 backdrop-blur-[4px]">
                    <div className="font-arcade text-foreground text-center text-5xl font-bold tracking-wide uppercase">
                        Descend into the Gaming Dungeon
                    </div>

                    <div className="w-30">
                        <Separator className="w-30" />
                    </div>

                    <div className="text-foreground max-w-md space-y-4 text-center text-base font-light">
                        <p>A modern-day arcade where 67 gaming PCs await you</p>
                        <p>Right in the heart of Brisbane City</p>
                    </div>
                </div>
            </div>
        </div>
    );
}
