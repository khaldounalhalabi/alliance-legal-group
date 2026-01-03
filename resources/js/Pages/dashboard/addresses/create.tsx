import Input from "@/Components/form/fields/Input";
import TranslatableInput from "@/Components/form/fields/TranslatableInput";
import Form from "@/Components/form/Form";
import PageCard from "@/Components/ui/PageCard";
import TranslatableInputsContext from "@/Contexts/TranslatableInputsContext";
import { useForm } from "@inertiajs/react";
import { FormEvent } from "react";

const Create = () => {
    const { post, setData, processing } = useForm<{
        _method?: "PUT" | "POST";
        country: string;
        city: string;
        address: string;
        map_link: string;
        image?: File | undefined;
    }>();

    const onSubmit = (e: FormEvent<HTMLFormElement>) => {
        e.preventDefault();

        post(route("v1.web.protected.addresses.store"));
    };

    return (
        <PageCard title="Add New Address">
            <TranslatableInputsContext>
                <Form onSubmit={onSubmit} processing={processing}>
                    <div
                        className={`grid grid-cols-1 items-start gap-5 md:grid-cols-2`}
                    >
                        <TranslatableInput
                            name="country"
                            label={"Country"}
                            onChange={(e) => setData("country", e.target.value)}
                            required
                        />
                        <TranslatableInput
                            name="city"
                            label={"City"}
                            onChange={(e) => setData("city", e.target.value)}
                            required
                        />
                        <TranslatableInput
                            name="address"
                            label={"Address"}
                            onChange={(e) => setData("address", e.target.value)}
                            required
                        />
                        <Input
                            name="image"
                            label={"Image"}
                            onChange={(e) =>
                                setData("image", e.target.files?.[0])
                            }
                            type={"file"}
                            required
                        />
                        <Input
                            name={"map_link"}
                            label={"Map Link"}
                            required
                            onChange={(e) =>
                                setData("map_link", e.target.value)
                            }
                            type={"url"}
                        />
                    </div>
                </Form>
            </TranslatableInputsContext>
        </PageCard>
    );
};

export default Create;
