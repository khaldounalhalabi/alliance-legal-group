import Gallery from "@/Components/show/Gallery";
import LongTextField from "@/Components/show/LongTextField";
import SmallTextField from "@/Components/show/SmallTextField";
import { Label } from "@/Components/ui/labels-and-values/Label";
import PageCard from "@/Components/ui/PageCard";
import { Button } from "@/Components/ui/shadcn/button";
import Category from "@/Models/Category";
import { translate } from "@/Models/Translatable";
import { Link } from "@inertiajs/react";

const Show = ({ category }: { category: Category }) => {
    return (
        <PageCard
            title={`Category Details: ${translate(category.name)}`}
            actions={
                <div className="flex items-center justify-between">
                    <Link
                        href={route(
                            "v1.web.protected.categories.edit",
                            category.id,
                        )}
                    >
                        <Button>Edit</Button>
                    </Link>
                </div>
            }
        >
            <div className="grid grid-cols-1 gap-5 md:grid-cols-2">
                <SmallTextField label="Name" value={translate(category.name)} />
                <SmallTextField
                    label="Cover Sentence"
                    value={translate(category.cover_sentence)}
                />
                <Label label={"Cover"} col className={"md:col-span-2"}>
                    <Gallery sources={[category?.cover?.url]} />
                </Label>
                <div className={"md:col-span-2"}>
                    <LongTextField
                        label="Description"
                        value={translate(category.description)}
                    />
                </div>
            </div>
        </PageCard>
    );
};

export default Show;
