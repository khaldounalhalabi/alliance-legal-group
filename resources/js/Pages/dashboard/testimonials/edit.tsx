import TranslatableInput from "@/Components/form/fields/TranslatableInput";
import TranslatableTextarea from "@/Components/form/fields/TranslatableTextarea";
import Form from "@/Components/form/Form";
import PageCard from "@/Components/ui/PageCard";
import TranslatableInputsContext from "@/Contexts/TranslatableInputsContext";
import Testimonial from "@/Models/Testimonial";
import { useForm } from "@inertiajs/react";
import { FormEvent } from "react";

const Edit = ({ testimonial }: { testimonial: Testimonial }) => {
    const { post, setData, processing } = useForm<{
        _method?: "PUT" | "POST";
        customer_name: string;
        customer_position?: string;
        testimonial: string;
    }>({
        _method: "PUT",
        customer_name: testimonial?.customer_name,
        customer_position: testimonial?.customer_position,
        testimonial: testimonial?.testimonial,
    });

    const onSubmit = (e: FormEvent<HTMLFormElement>) => {
        e.preventDefault();

        post(route("v1.web.protected.testimonials.update", testimonial.id));
    };

    return (
        <PageCard title="Edit Testimonial">
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
                            defaultValue={testimonial.customer_name}
                            required
                        />
                        <TranslatableInput
                            name="customer_position"
                            label={"Customer Position"}
                            onChange={(e) =>
                                setData("customer_position", e.target.value)
                            }
                            defaultValue={testimonial.customer_position}
                        />

                        <div className={"md:col-span-2"}>
                            <TranslatableTextarea
                                name="testimonial"
                                label={"Testimonial"}
                                onChange={(e) =>
                                    setData("testimonial", e.target.value)
                                }
                                defaultValue={testimonial.testimonial}
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
