import GcastleLogoIcon from '@/components/public/gcastle-logo-icon';
import { Price } from '@/domains/price/types';

type PriceSectionProps = {
    prices: Price[];
};

export default function PriceSection({ prices }: PriceSectionProps) {
    console.log(prices);
    return (
        <div className="mx-auto flex w-full max-w-[335px] flex-col py-6 lg:max-w-4xl">
            <h2 className="font-arcade text-foreground text-center text-4xl font-bold tracking-wide uppercase">Prices</h2>

            <div className="bg-gradient-custom flex aspect-505/707 min-w-[565px] flex-col justify-center border p-8 text-white">
                <div className="mx-auto flex flex-col items-center">
                    <GcastleLogoIcon width={100} className="text-white" />
                    <div className="font-arcade gcastle-text-shadow mt-2 text-5xl font-extrabold tracking-wider">G CASTLE</div>
                </div>
            </div>
        </div>
    );
}
