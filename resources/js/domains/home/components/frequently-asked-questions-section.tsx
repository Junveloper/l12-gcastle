import { Accordion, AccordionContent, AccordionItem, AccordionTrigger } from '@/components/ui/accordion';
import { FrequentlyAskedQuestion } from '../types';

type FrequentlyAskedQuestionsSectionProps = {
    frequentlyAskedQuestions: FrequentlyAskedQuestion[];
};

export default function FrequentlyAskedQuestionsSection({ frequentlyAskedQuestions }: FrequentlyAskedQuestionsSectionProps) {
    return (
        <div className="mx-auto flex w-full flex-col space-y-4 px-2 py-28 lg:max-w-5xl">
            <h2 className="font-arcade text-foreground gcastle-text-shadow text-center text-5xl font-bold tracking-wider uppercase">
                Frequently Asked Questions
            </h2>

            <p className="mx-auto my-12 max-w-sm px-4 text-center text-base leading-8 md:max-w-xl">
                Given how rare internet cafes are, you may have some questions. We've compiled a list of frequently asked questions to help you get
                started.
            </p>

            <div className="px-6 md:p-0">
                <Accordion type="multiple" className="mx-auto lg:w-3xl" defaultValue={[frequentlyAskedQuestions[0]?.id]}>
                    {frequentlyAskedQuestions.map((question) => (
                        <AccordionItem key={question.id} value={question.id}>
                            <AccordionTrigger className="text-lg">{question.question}</AccordionTrigger>
                            <AccordionContent>
                                <div
                                    className="prose prose-invert max-w-none [&_ul]:list-disc [&_ul]:pl-6"
                                    dangerouslySetInnerHTML={{ __html: question.answer }}
                                />
                            </AccordionContent>
                        </AccordionItem>
                    ))}
                </Accordion>
            </div>
        </div>
    );
}
