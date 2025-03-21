import { Price } from '@/domains/price/types';

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
