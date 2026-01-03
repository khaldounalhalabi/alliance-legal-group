import Input from "@/Components/form/fields/Input";
import TranslatableInput from "@/Components/form/fields/TranslatableInput";
import Form from "@/Components/form/Form";
import PageCard from "@/Components/ui/PageCard";
import TranslatableInputsContext from "@/Contexts/TranslatableInputsContext";
import Address from "@/Models/Address";
import Media from "@/Models/Media";
import { useForm } from "@inertiajs/react";
import { FormEvent } from "react";

const Edit = ({ address }: { address: Address }) => {
    const { post, setData, processing } = useForm<{
        _method?: "PUT" | "POST";
        country: string;
        city: string;
        address: string;
        map_link: string;
        image?: File | undefined | Media;
    }>({
        _method: "PUT",
        country: address?.country,
        city: address?.city,
        address: address?.address,
        map_link: address?.map_link,
        image: address?.image,
    });

    const onSubmit = (e: FormEvent<HTMLFormElement>) => {
        e.preventDefault();

        post(route("v1.web.protected.addresses.update", address.id));
    };

    return (
        <PageCard title="Edit Address">
            <TranslatableInputsContext>
                <Form onSubmit={onSubmit} processing={processing}>
                    <div
                        className={`grid grid-cols-1 items-start gap-5 md:grid-cols-2`}
                    >
                        <TranslatableInput
                            name="country"
                            label={"Country"}
                            onChange={(e) => setData("country", e.target.value)}
                            defaultValue={address.country}
                            required
                        />
                        <TranslatableInput
                            name="city"
                            label={"City"}
                            onChange={(e) => setData("city", e.target.value)}
                            defaultValue={address.city}
                            required
                        />
                        <TranslatableInput
                            name="address"
                            label={"Address"}
                            onChange={(e) => setData("address", e.target.value)}
                            defaultValue={address.address}
                            required
                        />
                        <Input
                            name="image"
                            label={"Image"}
                            onChange={(e) =>
                                setData("image", e.target.files?.[0])
                            }
                            type={"file"}
                        />
                        <Input
                            name={"map_link"}
                            label={"Map Link"}
                            defaultValue={address?.map_link}
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

export default Edit;
