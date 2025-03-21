import { Separator } from '@/components/ui/separator';
import heroImage from '@/images/hero-image.jpeg';

export default function HeroSection() {
    return (
        <div className="h-[500px] bg-cover bg-[center_top_10%]" style={{ backgroundImage: `url(${heroImage})` }}>
            <div className="bg-background/70 flex h-full w-full flex-col">
                <div className="my-auto flex w-full flex-col items-center space-y-10 py-26 backdrop-blur-[4px]">
                    <h1 className="font-arcade text-foreground text-center text-5xl font-bold tracking-wide uppercase">
                        Descend into the Gaming Dungeon
                    </h1>

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
