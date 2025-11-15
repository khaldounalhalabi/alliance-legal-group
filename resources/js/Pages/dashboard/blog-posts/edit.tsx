import Input from "@/Components/form/fields/Input";
import TranslatableInput from "@/Components/form/fields/TranslatableInput";
import Form from "@/Components/form/Form";
import PageCard from "@/Components/ui/PageCard";
import TranslatableInputsContext from "@/Contexts/TranslatableInputsContext";
import BlogPost from "@/Models/BlogPost";
import Media from "@/Models/Media";
import { useForm } from "@inertiajs/react";
import { FormEvent } from "react";

const Edit = ({ blogPost }: { blogPost: BlogPost }) => {
    const { post, setData, processing } = useForm<{
        _method?: "PUT" | "POST";
        title: string;
        small_description: string;
        content: string;
        author_name: string;
        cover?: File | undefined | Media;
    }>({
        _method: "PUT",
        title: blogPost?.title,
        small_description: blogPost?.small_description,
        content: blogPost?.content,
        author_name: blogPost?.author_name,
        cover: blogPost.cover,
    });

    const onSubmit = (e: FormEvent<HTMLFormElement>) => {
        e.preventDefault();
        post(route("v1.web.protected.blog.posts.update", blogPost.id));
    };

    return (
        <PageCard title="Edit BlogPost">
            <TranslatableInputsContext>
                <Form onSubmit={onSubmit} processing={processing}>
                    <div
                        className={`grid grid-cols-1 items-start gap-5 md:grid-cols-2`}
                    >
                        <TranslatableInput
                            name="title"
                            label={"Title"}
                            onChange={(e) => setData("title", e.target.value)}
                            defaultValue={blogPost.title}
                            required
                        />
                        <TranslatableInput
                            name="small_description"
                            label={"Small Description"}
                            onChange={(e) =>
                                setData("small_description", e.target.value)
                            }
                            defaultValue={blogPost.small_description}
                            required
                        />

                        <TranslatableInput
                            name="author_name"
                            label={"Author Name"}
                            onChange={(e) =>
                                setData("author_name", e.target.value)
                            }
                            defaultValue={blogPost.author_name}
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
                            <TranslatableInput
                                name="content"
                                label={"Content"}
                                onChange={(e) =>
                                    setData("content", e.target.value)
                                }
                                defaultValue={blogPost.content}
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
