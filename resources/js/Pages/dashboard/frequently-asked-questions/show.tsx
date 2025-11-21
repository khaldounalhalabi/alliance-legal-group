import LongTextField from "@/Components/show/LongTextField";
import SmallTextField from "@/Components/show/SmallTextField";
import PageCard from "@/Components/ui/PageCard";
import { Button } from "@/Components/ui/shadcn/button";
import FrequentlyAskedQuestion from "@/Models/FrequentlyAskedQuestion";
import { translate } from "@/Models/Translatable";
import { Link } from "@inertiajs/react";

const Show = ({
    frequentlyAskedQuestion,
}: {
    frequentlyAskedQuestion: FrequentlyAskedQuestion;
}) => {
    return (
        <PageCard
            title={`Frequently Asked Question Details: ${translate(frequentlyAskedQuestion.question)}`}
            actions={
                <div className="flex items-center justify-between">
                    <Link
                        href={route(
                            "v1.web.protected.frequently.asked.questions.edit",
                            frequentlyAskedQuestion.id,
                        )}
                    >
                        <Button>Edit</Button>
                    </Link>
                </div>
            }
        >
            <div className="grid grid-cols-1 gap-5 md:grid-cols-2">
                <SmallTextField
                    label="Question"
                    value={translate(frequentlyAskedQuestion.question)}
                />
                <div className={"md:col-span-2"}>
                    <LongTextField
                        label="Answer"
                        value={translate(frequentlyAskedQuestion.answer)}
                    />
                </div>
            </div>
        </PageCard>
    );
};

export default Show;
