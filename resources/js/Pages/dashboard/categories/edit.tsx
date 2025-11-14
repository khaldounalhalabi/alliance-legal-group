import Input from "@/Components/form/fields/Input";
import TranslatableTextEditor from "@/Components/form/fields/TranslatableEditor";
import TranslatableInput from "@/Components/form/fields/TranslatableInput";
import Form from "@/Components/form/Form";
import PageCard from "@/Components/ui/PageCard";
import TranslatableInputsContext from "@/Contexts/TranslatableInputsContext";
import Category from "@/Models/Category";
import Media from "@/Models/Media";
import { translate } from "@/Models/Translatable";
import { useForm } from "@inertiajs/react";
import { FormEvent } from "react";

const Edit = ({ category }: { category: Category }) => {
    const { post, setData, processing } = useForm<{
        _method?: "PUT" | "POST";
        name: string;
        description: string;
        cover?: File | undefined | Media;
        cover_sentence: string;
    }>({
        _method: "PUT",
        name: category?.name,
        description: category?.description,
        cover: category?.cover,
        cover_sentence: category?.cover_sentence,
    });

    const onSubmit = (e: FormEvent<HTMLFormElement>) => {
        e.preventDefault();

        post(route("v1.web.protected.categories.update", category.id));
    };

    return (
        <PageCard title={`Edit Category: ${translate(category.name)}`}>
            <TranslatableInputsContext>
                <Form onSubmit={onSubmit} processing={processing}>
                    <div
                        className={`grid grid-cols-1 items-start gap-5 md:grid-cols-2`}
                    >
                        <TranslatableInput
                            name="name"
                            label={"Name"}
                            onChange={(e) => setData("name", e.target.value)}
                            defaultValue={category.name}
                            required
                        />

                        <TranslatableInput
                            name="cover_sentence"
                            label={"Cover Sentence"}
                            onChange={(e) =>
                                setData("cover_sentence", e.target.value)
                            }
                            defaultValue={category.cover_sentence}
                            required
                        />

                        <Input
                            name="cover"
                            label={"Cover"}
                            onChange={(e) =>
                                setData("cover", e.target.files?.[0])
                            }
                            type={"file"}
                        />

                        <div className={"md:col-span-2"}>
                            <TranslatableTextEditor
                                name="description"
                                label={"Description"}
                                onChange={(e) =>
                                    setData("description", e.target.value)
                                }
                                defaultValue={category.description}
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
