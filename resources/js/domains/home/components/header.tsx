import GcastleLogoIcon from '@/components/public/gcastle-logo-icon';
import { Button } from '@/components/ui/button';
import {
    NavigationMenu,
    NavigationMenuItem,
    NavigationMenuLink,
    NavigationMenuList,
    navigationMenuTriggerStyle,
} from '@/components/ui/navigation-menu';
import { Sheet, SheetContent, SheetTitle, SheetTrigger } from '@/components/ui/sheet';
import { cn, scrollToSection } from '@/lib/utils';
import { NavItem } from '@/types';
import { Menu } from 'lucide-react';

const mainNavItems: NavItem[] = [
    {
        title: 'Price',
        action: () => scrollToSection('price', 50),
    },
    {
        title: 'Game List',
        action: () => scrollToSection('game-list', 50),
    },
    {
        title: 'FAQ',
        action: () => scrollToSection('faq', 50),
    },
    {
        title: 'Contact',
        action: () => scrollToSection('contact', 50),
    },
];

export default function Header() {
    return (
        <div className="border-sidebar-border/80 border-b">
            <div className="mx-auto flex h-16 items-center px-4 md:h-30 md:max-w-7xl md:px-12">
                {/* Mobile Menu */}
                <div className="w-full md:hidden">
                    <Sheet modal={false}>
                        <div className="flex min-w-full items-center justify-between">
                            <div className="flex items-center space-x-4 select-none">
                                <GcastleLogoIcon width={40} />
                                <span className="text-base font-bold">G-Castle Internet Cafe</span>
                            </div>
                            <SheetTrigger>
                                <div className="hover:bg-accent hover:text-accent-foreground mr-2 flex h-[34px] w-[34px] items-center justify-center rounded-md">
                                    <Menu className="h-5 w-5" />
                                </div>
                            </SheetTrigger>
                        </div>
                        <SheetContent side="top" className="bg-sidebar flex w-full flex-col items-stretch justify-between">
                            <SheetTitle>
                                <div className="flex items-center space-x-4 select-none">
                                    <GcastleLogoIcon width={40} />
                                    <span className="text-base font-bold">G-Castle Internet Cafe</span>
                                </div>
                            </SheetTitle>
                            <div className="mt-6 flex h-full flex-1 flex-col space-y-4">
                                <div className="flex h-full flex-col justify-between text-sm">
                                    <div className="flex flex-col space-y-4">
                                        {mainNavItems.map((item, index) => (
                                            <Button
                                                variant={'ghost'}
                                                textAlign={'start'}
                                                key={index}
                                                className="flex space-x-2 font-medium"
                                                onClick={item.action}
                                            >
                                                <span>{item.title}</span>
                                            </Button>
                                        ))}
                                    </div>
                                </div>
                            </div>
                        </SheetContent>
                    </Sheet>
                </div>

                {/* Logo */}
                <div className="hidden items-center justify-center space-x-4 select-none md:flex">
                    <GcastleLogoIcon width={80} />
                    <div className="flex flex-col">
                        <span className="font-arcade text-4xl leading-none tracking-wider">G CASTLE</span>
                        <span className="text-xs leading-none tracking-wider">INTERNET CAFE</span>
                    </div>
                </div>

                {/* Desktop Navigation */}
                <div className="ml-auto hidden h-full items-center space-x-6 md:flex">
                    <NavigationMenu className="flex h-full items-stretch">
                        <NavigationMenuList className="flex h-full items-stretch space-x-2">
                            {mainNavItems.map((item, index) => (
                                <NavigationMenuItem key={index} className="relative flex h-full items-center">
                                    <NavigationMenuLink
                                        className={cn(navigationMenuTriggerStyle(), 'h-9 cursor-pointer px-3 select-none')}
                                        onClick={item.action}
                                    >
                                        <span className="text-base font-bold tracking-wider">{item.title}</span>
                                    </NavigationMenuLink>
                                </NavigationMenuItem>
                            ))}
                        </NavigationMenuList>
                    </NavigationMenu>
                </div>
            </div>
        </div>
    );
}
