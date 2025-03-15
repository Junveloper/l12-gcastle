import { NavItem } from '@/types';
import { Link } from '@inertiajs/react';
import { LayoutGrid, Menu } from 'lucide-react';
import { Icon } from '../icon';
import { Button } from '../ui/button';
import { Sheet, SheetContent, SheetHeader, SheetTitle, SheetTrigger } from '../ui/sheet';
import GcastleLogoIcon from './gcastle-logo-icon';

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        url: '/dashboard',
        icon: LayoutGrid,
    },
];

export default function Header() {
    return (
        <div className="border-sidebar-border/80 border-b">
            <div className="mx-auto flex h-16 items-center px-4 md:max-w-7xl">
                {/* Mobile Menu */}
                <div className="lg:hidden">
                    <Sheet>
                        <SheetTrigger asChild>
                            <Button variant="ghost" size="icon" className="mr-2 h-[34px] w-[34px]">
                                <Menu className="h-5 w-5" />
                            </Button>
                        </SheetTrigger>
                        <SheetContent side="top" className="bg-sidebar flex w-full flex-col items-stretch justify-between">
                            <SheetTitle className="sr-only">Navigation Menu</SheetTitle>
                            <SheetHeader className="flex justify-start text-left">
                                <GcastleLogoIcon width={50} className="text-black dark:text-white" />
                            </SheetHeader>
                            <div className="mt-6 flex h-full flex-1 flex-col space-y-4">
                                <div className="flex h-full flex-col justify-between text-sm">
                                    <div className="flex flex-col space-y-4">
                                        {mainNavItems.map((item) => (
                                            <Link key={item.title} href={item.url} className="flex items-center space-x-2 font-medium">
                                                {item.icon && <Icon iconNode={item.icon} className="h-5 w-5" />}
                                                <span>{item.title}</span>
                                            </Link>
                                        ))}
                                    </div>
                                </div>
                            </div>
                        </SheetContent>
                    </Sheet>
                </div>
            </div>
        </div>
    );
}
