import GcastleLogoIcon from '@/components/public/gcastle-logo-icon';
import { Price } from '@/domains/price/types';
import { getHoursLabel, getPriceInDollars } from '@/domains/price/utils';

type PriceSectionProps = {
    prices: Price[];
};

export default function PriceSection({ prices }: PriceSectionProps) {
    const memberPrices = prices.filter((price) => price.type === 'membership');
    const membershipMinimum = memberPrices.find((price) => price.isMembershipMinimum);
    const nonMemberPrice = prices.find((price) => price.type === 'non_member');
    const nightSpecialPrice = prices.find((price) => price.type === 'night_special');

    return (
        <div className="mx-auto flex w-full flex-col px-2 py-6 lg:max-w-4xl">
            <h2 className="font-arcade text-foreground text-center text-4xl font-bold tracking-wide uppercase">Prices</h2>

            <div className="bg-gradient-custom flex flex-col justify-center border p-8 text-white">
                {/* Logo */}
                <div className="mx-auto flex flex-col items-center">
                    <GcastleLogoIcon width={100} className="text-white" withBoxShadow />
                    <div className="font-arcade gcastle-text-shadow mt-2 text-5xl font-extrabold tracking-wider">G CASTLE</div>
                </div>

                {/* Member Pricing Header */}
                <div className="font-arcade gcastle-text-shadow mt-4 text-center text-5xl font-extrabold tracking-wider">MEMBER PRICING</div>

                {/* Membership Prices */}
                <ol className="mt-4 space-y-0.5">
                    {memberPrices.map((price) => (
                        <li key={price.id} className="grid grid-cols-2 items-center">
                            <div className="pr-8 text-right text-2xl font-extralight">{getHoursLabel(price)}</div>
                            <div className="font-arcade gcastle-text-shadow text-5xl font-extrabold tracking-wider">${getPriceInDollars(price)}</div>
                        </li>
                    ))}
                </ol>

                {/* Pricing Structure Info */}
                {!!membershipMinimum && (
                    <div className="flex flex-col items-center justify-center">
                        <div className="mt-4 text-center text-sm sm:text-lg">
                            Purchasing {getHoursLabel(membershipMinimum)} with a Photo ID will get you a Membership Account
                        </div>

                        <div className="mt-4 text-center font-bold sm:text-2xl">Any unused time remains on your account for 365 days</div>
                    </div>
                )}

                {/* Non-Member Pricing */}
                {!!nonMemberPrice && (
                    <div className="mt-6 flex flex-col items-center justify-center">
                        <div className="text-2xl">NON-MEMBER PRICING</div>
                        <div className="mt-1 text-3xl font-bold">${getPriceInDollars(nonMemberPrice)} an hour</div>
                    </div>
                )}

                {/* Night Special Pricing */}
                {!!nightSpecialPrice && (
                    <div className="gcastle-box-shadow mx-auto mt-6 flex flex-col items-center justify-center border-4 border-white px-14 py-3 text-center">
                        <div className="text-2xl">MEMBER NIGHT SPECIAL</div>
                        <div className="my-3 text-3xl">$17 for 9 hours</div>
                        <div className="mt-2 text-sm">Only available between 10am - 2am</div>
                        <div className="mt-1 text-sm font-bold">Remaining time will be lost</div>
                    </div>
                )}
            </div>
        </div>
    );
}
