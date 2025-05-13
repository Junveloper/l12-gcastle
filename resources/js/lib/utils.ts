import { type ClassValue, clsx } from 'clsx';
import { twMerge } from 'tailwind-merge';

export function cn(...inputs: ClassValue[]) {
    return twMerge(clsx(inputs));
}

export function scrollToSection(id: string, yOffset?: number) {
    const element = document.getElementById(id);

    if (!element) {
        return;
    }

    const y = element.getBoundingClientRect().top + window.scrollY + (yOffset || 0);

    window.scrollTo({ top: y, behavior: 'smooth' });
}
