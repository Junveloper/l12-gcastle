import { cn } from '@/lib/utils';
import { type LucideProps } from 'lucide-react';

type IconProps = {
    iconNode: React.ComponentType<LucideProps>;
} & Omit<LucideProps, 'ref'>;

export function Icon({ iconNode: IconComponent, className, ...props }: IconProps) {
    return <IconComponent className={cn('h-4 w-4', className)} {...props} />;
}
