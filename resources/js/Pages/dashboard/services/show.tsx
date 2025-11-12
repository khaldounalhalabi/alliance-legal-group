import Gallery from "@/Components/show/Gallery";
import LongTextField from "@/Components/show/LongTextField";
import SmallTextField from "@/Components/show/SmallTextField";
import { Label } from "@/Components/ui/labels-and-values/Label";
import PageCard from "@/Components/ui/PageCard";
import { Button } from "@/Components/ui/shadcn/button";
import Service from "@/Models/Service";
import { translate } from "@/Models/Translatable";
import { Link } from "@inertiajs/react";

const Show = ({ service }: { service: Service }) => {
    return (
        <PageCard
            title={`Service Details: ${translate(service.name)}`}
            actions={
                <div className="flex items-center justify-between">
                    <Link
                        href={route(
                            "v1.web.protected.services.edit",
                            service.id,
                        )}
                    >
                        <Button>Edit</Button>
                    </Link>
                </div>
            }
        >
            <div className="grid grid-cols-1 gap-5 md:grid-cols-2">
                <SmallTextField label="Name" value={translate(service.name)} />
                <SmallTextField
                    label="Category"
                    value={translate(service?.category?.name)}
                />
                <Label label={"Cover"} col className={"md:col-span-2"}>
                    <Gallery sources={[service?.cover?.url]} />
                </Label>
                <Label label={"Image"} col className={"md:col-span-2"}>
                    <Gallery sources={[service?.image?.url]} />
                </Label>
                <div className={"md:col-span-2"}>
                    <LongTextField
                        label="Description"
                        value={translate(service.description)}
                    />
                </div>
            </div>
        </PageCard>
    );
};

export default Show;
