import Form from "@/Components/form/Form";
import TranslatableInput from "@/Components/form/fields/TranslatableInput";
import TranslatableTextarea from "@/Components/form/fields/TranslatableTextarea";
import PageCard from "@/Components/ui/PageCard";
import TranslatableInputsContext from "@/Contexts/TranslatableInputsContext";
import FrequentlyAskedQuestion from "@/Models/FrequentlyAskedQuestion";
import { translate } from "@/Models/Translatable";
import { useForm } from "@inertiajs/react";
import { FormEvent } from "react";

const Edit = ({
    frequentlyAskedQuestion,
}: {
    frequentlyAskedQuestion: FrequentlyAskedQuestion;
}) => {
    const { post, setData, processing } = useForm<{
        _method?: "PUT" | "POST";
        question: string;
        answer: string;
    }>({
        _method: "PUT",
        question: frequentlyAskedQuestion?.question,
        answer: frequentlyAskedQuestion?.answer,
    });

    const onSubmit = (e: FormEvent<HTMLFormElement>) => {
        e.preventDefault();

        post(
            route(
                "v1.web.protected.frequently.asked.questions.update",
                frequentlyAskedQuestion.id,
            ),
        );
    };

    return (
        <PageCard
            title={`Edit Frequently Asked Question: ${translate(frequentlyAskedQuestion.question)}`}
        >
            <TranslatableInputsContext>
                <Form onSubmit={onSubmit} processing={processing}>
                    <div
                        className={`grid grid-cols-1 items-start gap-5 md:grid-cols-2`}
                    >
                        <TranslatableInput
                            name="question"
                            label={"Question"}
                            onChange={(e) =>
                                setData("question", e.target.value)
                            }
                            defaultValue={frequentlyAskedQuestion.question}
                            required
                        />
                        <div className={"md:col-span-2"}>
                            <TranslatableTextarea
                                name="answer"
                                label={"Answer"}
                                onChange={(e) =>
                                    setData("answer", e.target.value)
                                }
                                defaultValue={frequentlyAskedQuestion.answer}
                                required
                            />
                        </div>
                    </div>
                </Form>
            </TranslatableInputsContext>
        </PageCard>
    );
};

export default Edit;
