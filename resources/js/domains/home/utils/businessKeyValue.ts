import { BusinessKey, BusinessKeyValue } from '@/domains/home/types';
import { Facebook, Instagram, Mail, Map, MapPinHouse, Phone } from 'lucide-react';
import { ElementType } from 'react';

export function getContactValues(keyValues: BusinessKeyValue[]) {
    return keyValues.filter((keyValue) => keyValue.usage === 'contact');
}

export function getSocialMediaValues(keyValues: BusinessKeyValue[]) {
    return keyValues.filter((keyValue) => keyValue.usage === 'social_media');
}

export function getMapValue(keyValues: BusinessKeyValue[]) {
    return keyValues.find((keyValue) => keyValue.usage === 'map');
}

export function getAddressValue(keyValues: BusinessKeyValue[]) {
    return keyValues.find((keyValue) => keyValue.usage === 'address');
}

export function getBusinessKeyIcon(key: BusinessKey) {
    const businessKeyIconMap: Record<BusinessKey, ElementType> = {
        instagram_url: Instagram,
        facebook_url: Facebook,
        google_maps_url: Map,
        email: Mail,
        phone: Phone,
        address: MapPinHouse,
    };

    return businessKeyIconMap[key];
}
