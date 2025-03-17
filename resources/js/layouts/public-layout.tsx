type PublicLayoutProps = {
    children: React.ReactNode;
};

export function PublicLayout({ children }: PublicLayoutProps) {
    return <div className="flex min-h-screen w-full flex-col">{children}</div>;
}
