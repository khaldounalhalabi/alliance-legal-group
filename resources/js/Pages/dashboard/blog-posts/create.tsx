import Input from "@/Components/form/fields/Input";
import TranslatableTextEditor from "@/Components/form/fields/TranslatableEditor";
import TranslatableInput from "@/Components/form/fields/TranslatableInput";
import Form from "@/Components/form/Form";
import PageCard from "@/Components/ui/PageCard";
import TranslatableInputsContext from "@/Contexts/TranslatableInputsContext";
import { useForm } from "@inertiajs/react";
import { FormEvent } from "react";

const Create = () => {
    const { post, setData, processing } = useForm<{
        _method?: "PUT" | "POST";
        title: string;
        small_description: string;
        content: string;
        author_name: string;
        cover?: File | undefined;
    }>();

    const onSubmit = (e: FormEvent<HTMLFormElement>) => {
        e.preventDefault();
        post(route("v1.web.protected.blog.posts.store"));
    };

    return (
        <PageCard title="Add New BlogPost">
            <TranslatableInputsContext>
                <Form onSubmit={onSubmit} processing={processing}>
                    <div
                        className={`grid grid-cols-1 items-start gap-5 md:grid-cols-2`}
                    >
                        <TranslatableInput
                            name="title"
                            label={"Title"}
                            onChange={(e) => setData("title", e.target.value)}
                            required
                        />
                        <TranslatableInput
                            name="small_description"
                            label={"Small Description"}
                            onChange={(e) =>
                                setData("small_description", e.target.value)
                            }
                            required
                        />
                        <TranslatableInput
                            name="author_name"
                            label={"Author Name"}
                            onChange={(e) =>
                                setData("author_name", e.target.value)
                            }
                            required
                        />
                        <Input
                            name="cover"
                            label={"Cover"}
                            onChange={(e) =>
                                setData("cover", e.target.files?.[0])
                            }
                            type={"file"}
                            required
                        />

                        <div className="md:col-span-2">
                            <TranslatableTextEditor
                                name="content"
                                label={"Content"}
                                onChange={(e) =>
                                    setData("content", e.target.value)
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
