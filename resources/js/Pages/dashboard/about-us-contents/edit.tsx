import Form from "@/Components/form/Form";
import Input from "@/Components/form/fields/Input";
import TranslatableTextarea from "@/Components/form/fields/TranslatableTextarea";
import PageCard from "@/Components/ui/PageCard";
import TranslatableInputsContext from "@/Contexts/TranslatableInputsContext";
import AboutUsContent from "@/Models/AboutUsContent";
import { useForm } from "@inertiajs/react";
import { FormEvent } from "react";

const Edit = ({ aboutUsContent }: { aboutUsContent: AboutUsContent }) => {
    const { post, setData, processing } = useForm<{
        _method?: "PUT" | "POST";
        content: string;
    }>({
        _method: "PUT",
        content: aboutUsContent?.content,
    });

    const onSubmit = (e: FormEvent<HTMLFormElement>) => {
        e.preventDefault();

        post(
            route(
                "v1.web.protected.about.us.contents.update",
                aboutUsContent.id,
            ),
        );
    };

    return (
        <PageCard title={`Edit About Us Content: ${aboutUsContent?.type}`}>
            <TranslatableInputsContext>
                <Form onSubmit={onSubmit} processing={processing}>
                    <div
                        className={`grid grid-cols-1 items-start gap-5 md:grid-cols-2`}
                    >
                        <div className={"md:col-span-2"}>
                            <TranslatableTextarea
                                name="content"
                                label={"Content"}
                                onChange={(e) =>
                                    setData("content", e.target.value)
                                }
                                defaultValue={aboutUsContent.content}
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
