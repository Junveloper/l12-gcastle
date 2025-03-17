import { LucideIcon } from 'lucide-react';

export type Auth = {
    user: User;
};

export type BreadcrumbItem = {
    title: string;
    href: string;
};

export type NavGroup = {
    title: string;
    items: NavItem[];
};

export type NavItem = {
    title: string;
    url?: string;
    action?: () => void;
    icon?: LucideIcon | null;
    isActive?: boolean;
};

export type SharedData = {
    auth: Auth;
    [key: string]: unknown;
};

export type User = {
    id: number;
    first_name: string;
    last_name: string;
    email: string;
    email_verified_at: string | null;
    employment_start_date: string;
    employment_end_date: string | null;
    created_at: string;
    updated_at: string;
    [key: string]: unknown; // This allows for additional properties...
};
