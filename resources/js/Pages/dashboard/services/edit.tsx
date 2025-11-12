import Input from "@/Components/form/fields/Input";
import ApiSelect from "@/Components/form/fields/selects/ApiSelect";
import TranslatableTextEditor from "@/Components/form/fields/TranslatableEditor";
import TranslatableInput from "@/Components/form/fields/TranslatableInput";
import Form from "@/Components/form/Form";
import PageCard from "@/Components/ui/PageCard";
import TranslatableInputsContext from "@/Contexts/TranslatableInputsContext";
import Category from "@/Models/Category";
import Media from "@/Models/Media";
import Service from "@/Models/Service";
import { translate } from "@/Models/Translatable";
import Http from "@/Modules/Http/Http";
import { useForm } from "@inertiajs/react";
import { FormEvent } from "react";

const Edit = ({ service }: { service: Service }) => {
    const { post, setData, processing } = useForm<{
        _method?: "PUT" | "POST";
        name: string;
        description: string;
        category_id: number;
        cover?: File | undefined | Media;
        image?: File | undefined | Media;
    }>({
        _method: "PUT",
        name: service?.name,
        description: service?.description,
        category_id: service?.category_id,
        cover: service.cover,
        image: service.image,
    });

    const onSubmit = (e: FormEvent<HTMLFormElement>) => {
        e.preventDefault();
        post(route("v1.web.protected.services.update", service.id));
    };

    return (
        <PageCard title={`Edit Service: ${translate(service.name)}`}>
            <TranslatableInputsContext>
                <Form onSubmit={onSubmit} processing={processing}>
                    <div
                        className={`grid grid-cols-1 items-start gap-5 md:grid-cols-2`}
                    >
                        <TranslatableInput
                            name="name"
                            label={"Name"}
                            onChange={(e) => setData("name", e.target.value)}
                            defaultValue={service.name}
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
                        <Input
                            name="image"
                            label={"Image"}
                            onChange={(e) =>
                                setData("image", e.target.files?.[0])
                            }
                            type={"file"}
                        />
                        <ApiSelect
                            name="category_id"
                            label={"Category"}
                            api={(page, search) =>
                                Http.make<Category[]>().get(
                                    route("v1.web.protected.categories.data"),
                                    { page: page, search: search },
                                )
                            }
                            getDataArray={(response) => response?.data ?? []}
                            getIsLast={(data) =>
                                data?.paginate?.is_last_page ?? false
                            }
                            getTotalPages={(data) =>
                                data?.paginate?.total_pages ?? 0
                            }
                            onChange={(e) =>
                                setData("category_id", Number(e.target.value))
                            }
                            getOptionLabel={(data) => translate(data.name)}
                            optionValue={"id"}
                            defaultValue={service?.category}
                            required
                        />
                        <div className={"md:col-span-2"}>
                            <TranslatableTextEditor
                                name="description"
                                label={"Description"}
                                onChange={(e) =>
                                    setData("description", e.target.value)
                                }
                                defaultValue={service.description}
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
