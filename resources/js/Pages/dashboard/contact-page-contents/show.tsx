import LongTextField from "@/Components/show/LongTextField";
import SmallTextField from "@/Components/show/SmallTextField";
import PageCard from "@/Components/ui/PageCard";
import { Button } from "@/Components/ui/shadcn/button";
import { toTitleCase } from "@/helper";
import ContactPageContent from "@/Models/ContactPageContent";
import { Link } from "@inertiajs/react";

const Show = ({
    contactPageContent,
}: {
    contactPageContent: ContactPageContent;
}) => {
    return (
        <PageCard
            title={`Contact Page Content: ${toTitleCase(contactPageContent?.key)}`}
            actions={
                <div className="flex items-center justify-between">
                    <Link
                        href={route(
                            "v1.web.protected.contact.page.contents.edit",
                            contactPageContent.id,
                        )}
                    >
                        <Button>Edit</Button>
                    </Link>
                </div>
            }
        >
            <div className="grid grid-cols-1 gap-5 md:grid-cols-2">
                <SmallTextField label="Key" value={contactPageContent.key} />
            </div>

            <LongTextField label="Value" value={contactPageContent.value} />
        </PageCard>
    );
};

export default Show;
