import Form from "@/Components/form/Form";
import TranslatableInput from "@/Components/form/fields/TranslatableInput";
import TranslatableTextarea from "@/Components/form/fields/TranslatableTextarea";
import PageCard from "@/Components/ui/PageCard";
import TranslatableInputsContext from "@/Contexts/TranslatableInputsContext";
import { useForm } from "@inertiajs/react";
import { FormEvent } from "react";

const Create = () => {
    const { post, setData, processing } = useForm<{
        _method?: "PUT" | "POST";
        question: string;
        answer: string;
    }>();

    const onSubmit = (e: FormEvent<HTMLFormElement>) => {
        e.preventDefault();

        post(route("v1.web.protected.frequently.asked.questions.store"));
    };

    return (
        <PageCard title="Add New FrequentlyAskedQuestion">
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
                            required
                        />
                        <div className={"md:col-span-2"}>
                            <TranslatableTextarea
                                name="answer"
                                label={"Answer"}
                                onChange={(e) =>
                                    setData("answer", e.target.value)
                                }
                                required
                            />
                        </div>
                    </div>
                </Form>
            </TranslatableInputsContext>
        </PageCard>
    );
};

export default Create;
