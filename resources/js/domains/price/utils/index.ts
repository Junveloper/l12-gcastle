import { Price } from '@/domains/price/types';
import { format } from 'date-fns';

export function getDurationInHours(price: Price) {
    return price.duration / 60;
}

export function getHoursLabel(price: Price) {
    const hours = getDurationInHours(price);

    if (hours === 1.0) {
        return '1 hour';
    }

    return `${hours} hours`;
}

export function getPriceInDollars(price: Price) {
    return price.price / 100;
}

export function getPurchasableTimeLabel(price: Price) {
    if (!price.purchasableFrom || !price.purchasableTo) {
        return '';
    }

    const formattedPurchasableFrom = format(price.purchasableFrom, 'ha').toLowerCase();

    const formattedPurchasableTo = format(price.purchasableTo, 'ha').toLowerCase();

    return `${formattedPurchasableFrom} - ${formattedPurchasableTo}`;
}
