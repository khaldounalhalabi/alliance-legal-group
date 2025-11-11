import Form from "@/Components/form/Form";
import Input from "@/Components/form/fields/Input";
import PageCard from "@/Components/ui/PageCard";
import ContactPageContent from "@/Models/ContactPageContent";
import { toTitleCase } from "@/helper";
import { useForm } from "@inertiajs/react";
import { FormEvent } from "react";

const Edit = ({
    contactPageContent,
}: {
    contactPageContent: ContactPageContent;
}) => {
    const { post, setData, processing } = useForm<{
        _method?: "PUT" | "POST";
        value: string;
    }>({
        _method: "PUT",
        value: contactPageContent?.value,
    });

    const onSubmit = (e: FormEvent<HTMLFormElement>) => {
        e.preventDefault();

        post(
            route(
                "v1.web.protected.contact.page.contents.update",
                contactPageContent.id,
            ),
        );
    };

    return (
        <PageCard
            title={`Edit Contact Page Content: ${toTitleCase(contactPageContent?.key)}`}
        >
            <Form onSubmit={onSubmit} processing={processing}>
                <div
                    className={`grid grid-cols-1 items-start gap-5 md:grid-cols-2`}
                >
                    <Input
                        name="key"
                        label={"Key"}
                        type={"text"}
                        value={contactPageContent.key}
                        required
                        disabled
                    />
                    <Input
                        name="value"
                        label={"Value"}
                        onChange={(e) => setData("value", e.target?.value)}
                        defaultValue={contactPageContent.value}
                        required
                    />
                </div>
            </Form>
        </PageCard>
    );
};

export default Edit;
