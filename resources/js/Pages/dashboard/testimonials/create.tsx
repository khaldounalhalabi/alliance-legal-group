import Input from "@/Components/form/fields/Input";
import TranslatableInput from "@/Components/form/fields/TranslatableInput";
import TranslatableTextarea from "@/Components/form/fields/TranslatableTextarea";
import Form from "@/Components/form/Form";
import PageCard from "@/Components/ui/PageCard";
import TranslatableInputsContext from "@/Contexts/TranslatableInputsContext";
import Media from "@/Models/Media";
import { useForm } from "@inertiajs/react";
import { FormEvent } from "react";

const Create = () => {
    const { post, setData, processing } = useForm<{
        _method?: "PUT" | "POST";
        customer_name: string;
        customer_position?: string;
        testimonial: string;
        customer_image?: File | undefined | Media;
    }>();

    const onSubmit = (e: FormEvent<HTMLFormElement>) => {
        e.preventDefault();
        post(route("v1.web.protected.testimonials.store"));
    };

    return (
        <PageCard title="Add New Testimonial">
            <TranslatableInputsContext>
                <Form onSubmit={onSubmit} processing={processing}>
                    <div
                        className={`grid grid-cols-1 items-start gap-5 md:grid-cols-2`}
                    >
                        <TranslatableInput
                            name="customer_name"
                            label={"Customer Name"}
                            onChange={(e) =>
                                setData("customer_name", e.target.value)
                            }
                            required
                        />
                        <TranslatableInput
                            name="customer_position"
                            label={"Customer Position"}
                            onChange={(e) =>
                                setData("customer_position", e.target.value)
                            }
                        />

                        <Input
                            name="customer_image"
                            label={"Customer Image"}
                            onChange={(e) =>
                                setData("customer_image", e.target.files?.[0])
                            }
                            type={"file"}
                        />

                        <div className={"md:col-span-2"}>
                            <TranslatableTextarea
                                name="testimonial"
                                label={"Testimonial"}
                                onChange={(e) =>
                                    setData("testimonial", e.target.value)
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
