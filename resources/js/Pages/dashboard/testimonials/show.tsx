import LongTextField from "@/Components/show/LongTextField";
import SmallTextField from "@/Components/show/SmallTextField";
import PageCard from "@/Components/ui/PageCard";
import { Button } from "@/Components/ui/shadcn/button";
import Testimonial from "@/Models/Testimonial";
import { translate } from "@/Models/Translatable";
import { Link } from "@inertiajs/react";

const Show = ({ testimonial }: { testimonial: Testimonial }) => {
    return (
        <PageCard
            title="Testimonial Details"
            actions={
                <div className="flex items-center justify-between">
                    <Link
                        href={route(
                            "v1.web.protected.testimonials.edit",
                            testimonial.id,
                        )}
                    >
                        <Button>Edit</Button>
                    </Link>
                </div>
            }
        >
            <div className="grid grid-cols-1 gap-5 md:grid-cols-2">
                <SmallTextField
                    label="Customer Name"
                    value={translate(testimonial.customer_name)}
                />
                <SmallTextField
                    label="Customer Position"
                    value={translate(testimonial?.customer_position)}
                />
                <div className={"md:col-span-2"}>
                    <LongTextField
                        label="Testimonial"
                        value={translate(testimonial.testimonial)}
                    />
                </div>
            </div>
        </PageCard>
    );
};

export default Show;
