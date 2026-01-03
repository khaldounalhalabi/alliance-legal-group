import Gallery from "@/Components/show/Gallery";
import LongTextField from "@/Components/show/LongTextField";
import SmallTextField from "@/Components/show/SmallTextField";
import { Label } from "@/Components/ui/labels-and-values/Label";
import PageCard from "@/Components/ui/PageCard";
import { Button } from "@/Components/ui/shadcn/button";
import Address from "@/Models/Address";
import { translate } from "@/Models/Translatable";
import { Link } from "@inertiajs/react";

const Show = ({ address }: { address: Address }) => {
    return (
        <PageCard
            title="Address Details"
            actions={
                <div className="flex items-center justify-between">
                    <Link
                        href={route(
                            "v1.web.protected.addresses.edit",
                            address.id,
                        )}
                    >
                        <Button>Edit</Button>
                    </Link>
                </div>
            }
        >
            <div className="grid grid-cols-1 gap-5 md:grid-cols-2">
                <SmallTextField
                    label="Country"
                    value={translate(address.country)}
                />
                <SmallTextField label="City" value={translate(address.city)} />
                <SmallTextField
                    label="Address"
                    value={translate(address.address)}
                />
                <Label label={"Image"} col className={"md:col-span-2"}>
                    <Gallery sources={[address?.image?.url]} />
                </Label>
            </div>

            <LongTextField label="Map Link" value={address.map_link} />
        </PageCard>
    );
};

export default Show;
