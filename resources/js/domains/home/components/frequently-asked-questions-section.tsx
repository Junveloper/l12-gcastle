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

            <p className="mx-auto mt-12 max-w-sm px-4 text-center text-base leading-8 md:max-w-xl">Unfamiliar with internet cafes?</p>

            <p className="mx-auto mb-12 max-w-sm px-4 text-center text-base leading-8 md:max-w-xl">
                We've compiled a list of frequently asked questions that you may have.
            </p>

            <div className="px-6 md:p-0">
                <Accordion type="single" className="mx-auto lg:w-3xl">
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
