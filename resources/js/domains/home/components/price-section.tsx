import { Price } from '@/domains/price/types';
import { getHoursLabel, getPriceInDollars, getPurchasableTimeLabel } from '@/domains/price/utils';

type PriceSectionProps = {
    prices: Price[];
};

export default function PriceSection({ prices }: PriceSectionProps) {
    const memberPrices = prices.filter((price) => price.type === 'membership');
    const membershipMinimum = memberPrices.find((price) => price.isMembershipMinimum);
    const nonMemberPrice = prices.find((price) => price.type === 'non_member');
    const nightSpecialPrice = prices.find((price) => price.type === 'night_special');

    return (
        <div className="mx-auto flex w-full flex-col space-y-4 px-2 py-6 lg:max-w-5xl">
            <h2 className="font-arcade text-foreground gcastle-text-shadow text-center text-5xl font-bold tracking-wider uppercase">Prices</h2>

            <p className="mx-auto max-w-sm px-4 text-center text-base leading-8 md:max-w-xl">
                We offer flexible pricing to suit everyone - from casual visitors to dedicated gamers - with
                <span className="font-bold"> cheaper rates</span> for members.
            </p>

            <div className="mx-auto mt-2 flex flex-col justify-center text-white md:h-[650px] md:w-[550px]">
                {/* Member Pricing Header */}
                <div className="font-arcade gcastle-text-shadow mt-4 text-center text-4xl font-extrabold tracking-wider">MEMBER PRICING</div>

                {/* Membership Prices */}
                <ol className="mt-4 flex w-full flex-col items-center justify-center space-y-0.5">
                    {memberPrices.map((price) => (
                        <li key={price.id} className="grid grid-cols-2 items-center">
                            <div className="text-right text-xl font-extralight">{getHoursLabel(price)}</div>
                            <div className="font-arcade gcastle-text-shadow ml-8 text-3xl font-extrabold tracking-wider">
                                ${getPriceInDollars(price)}
                            </div>
                        </li>
                    ))}
                </ol>

                {/* Pricing Structure Info */}
                {!!membershipMinimum && (
                    <div className="flex flex-col items-center justify-center tracking-wide">
                        <div className="mt-4 text-center text-xs md:text-sm">
                            Purchasing {getHoursLabel(membershipMinimum)} with a Photo ID will get you a Membership Account
                        </div>

                        <div className="mt-4 text-center text-base font-bold md:text-xl">Any unused time stays on your account for a year</div>
                    </div>
                )}

                {/* Non-Member Pricing */}
                {!!nonMemberPrice && (
                    <div className="mt-6 flex flex-col items-center justify-center tracking-wide">
                        <div className="text-lg">NON-MEMBER PRICING</div>
                        <div className="mt-1 text-2xl font-bold">${getPriceInDollars(nonMemberPrice)} an hour</div>
                    </div>
                )}

                {/* Night Special Pricing */}
                {!!nightSpecialPrice && (
                    <div className="gcastle-box-shadow mx-auto mt-6 flex flex-col items-center justify-center border-2 border-white px-14 py-3 text-center tracking-wide">
                        <div className="text-lg">MEMBER NIGHT SPECIAL</div>
                        <div className="my-3 text-xl">
                            ${getPriceInDollars(nightSpecialPrice)} for {getHoursLabel(nightSpecialPrice)}
                        </div>
                        <div className="mt-2 text-xs">Only available between {getPurchasableTimeLabel(nightSpecialPrice)}</div>
                        <div className="mt-1 text-xs font-bold">Remaining time will be lost</div>
                    </div>
                )}
            </div>
        </div>
    );
}
