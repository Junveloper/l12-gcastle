import { Button } from '@/components/ui/button';
import { Dialog, DialogContent, DialogFooter } from '@/components/ui/dialog';
import { type Modal } from '../types';

type ModalProps = {
    modal: Modal;
    isOpen: boolean;
    onOpenChange: (isOpen: boolean) => void;
};

export default function ModalComponent({ modal, isOpen, onOpenChange }: ModalProps) {
    return (
        <Dialog open={isOpen} onOpenChange={onOpenChange}>
            <DialogContent hideCloseButton>
                <div className="flex flex-col">
                    <div className="mb-6 text-center">
                        <h2 className="text-2xl font-bold" style={{ color: modal.titleDisplayColour }}>
                            {modal.title}
                        </h2>
                    </div>
                    <div className="text-center" dangerouslySetInnerHTML={{ __html: modal.content }} />
                </div>
                <DialogFooter>
                    <div className="flex w-full justify-center">
                        <Button className="w-full cursor-pointer md:w-1/2" variant="default" onClick={() => onOpenChange(false)}>
                            Close
                        </Button>
                    </div>
                </DialogFooter>
            </DialogContent>
        </Dialog>
    );
}
