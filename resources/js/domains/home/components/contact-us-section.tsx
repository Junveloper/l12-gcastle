import { Button } from '@/components/ui/button';
import { BusinessKeyValue } from '@/domains/home/types';
import { getAddressValue, getBusinessKeyIcon, getContactValues, getMapValue, getSocialMediaValues } from '@/domains/home/utils/businessKeyValue';

type ContactUsSectionProps = {
    businessKeyValues: BusinessKeyValue[];
};

export default function ContactUsSection({ businessKeyValues }: ContactUsSectionProps) {
    const contactValues = getContactValues(businessKeyValues);
    const socialMediaValues = getSocialMediaValues(businessKeyValues);
    const addressValue = getAddressValue(businessKeyValues);
    const mapValue = getMapValue(businessKeyValues);

    function getMapContent() {
        if (!mapValue || !addressValue) {
            return null;
        }

        const MapIcon = getBusinessKeyIcon(mapValue.key);

        return (
            <div className="flex flex-col space-y-2">
                <div className="flex items-center justify-center space-x-2 text-xl font-medium">
                    <div className="flex h-5 w-5 items-center justify-center">
                        <MapIcon />
                    </div>
                    <span>Address: </span>
                </div>
                <a
                    href={mapValue.value}
                    target="_blank"
                    rel="noopener noreferrer"
                    className="w-[200px] text-center leading-8 underline underline-offset-4"
                >
                    {addressValue.value}
                </a>
            </div>
        );
    }

    return (
        <div className="mx-auto flex w-full flex-col space-y-4 px-2 py-28 lg:max-w-5xl">
            <h2 className="font-arcade text-foreground gcastle-text-shadow text-center text-5xl font-bold tracking-wider uppercase">Contact Us</h2>

            <p className="mx-auto mt-6 max-w-sm px-4 text-center text-base leading-8 md:max-w-xl">
                You can reach out to us through the following channels:
            </p>

            <div className="mx-auto mt-8 flex flex-col space-y-6">
                {socialMediaValues.map((value) => {
                    const Icon = getBusinessKeyIcon(value.key);

                    return (
                        <div key={value.id}>
                            <Button asChild variant={'outline'}>
                                <a href={value.value} target="_blank" className="h-[60px] w-[200px] items-center justify-between">
                                    <div className="flex w-full items-center justify-center space-x-4 text-xl font-light">
                                        {Icon && (
                                            <div className="flex h-5 w-5 items-center justify-center">
                                                <Icon />
                                            </div>
                                        )}
                                        <span>{value.label}</span>
                                    </div>
                                </a>
                            </Button>
                        </div>
                    );
                })}
            </div>

            <div className="mx-auto mt-8 flex flex-col space-y-10">
                {contactValues.map((value) => {
                    const Icon = getBusinessKeyIcon(value.key);

                    return (
                        <div key={value.id}>
                            <div className="mb-2 flex items-center justify-center space-x-2 text-xl font-medium">
                                {Icon && (
                                    <div className="flex h-5 w-5 items-center justify-center">
                                        <Icon />
                                    </div>
                                )}
                                <span>{value.label}: </span>
                            </div>

                            <div className="text-center">{value.value}</div>
                        </div>
                    );
                })}

                {getMapContent()}
            </div>
        </div>
    );
}
