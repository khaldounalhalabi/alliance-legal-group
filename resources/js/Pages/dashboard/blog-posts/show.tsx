import Gallery from "@/Components/show/Gallery";
import LongTextField from "@/Components/show/LongTextField";
import SmallTextField from "@/Components/show/SmallTextField";
import { Label } from "@/Components/ui/labels-and-values/Label";
import PageCard from "@/Components/ui/PageCard";
import { Button } from "@/Components/ui/shadcn/button";
import BlogPost from "@/Models/BlogPost";
import { translate } from "@/Models/Translatable";
import { Link } from "@inertiajs/react";

const Show = ({ blogPost }: { blogPost: BlogPost }) => {
    return (
        <PageCard
            title="BlogPost Details"
            actions={
                <div className="flex items-center justify-between">
                    <Link
                        href={route(
                            "v1.web.protected.blog.posts.edit",
                            blogPost.id,
                        )}
                    >
                        <Button>Edit</Button>
                    </Link>
                </div>
            }
        >
            <div className="grid grid-cols-1 gap-5 md:grid-cols-2">
                <SmallTextField
                    label="Title"
                    value={translate(blogPost.title)}
                />
                <SmallTextField
                    label="Small Description"
                    value={translate(blogPost.small_description)}
                />
                <SmallTextField
                    label="Author Name"
                    value={translate(blogPost.author_name)}
                />
                <Label label={"Cover"} col className={"md:col-span-2"}>
                    <Gallery sources={[blogPost?.cover?.url]} />
                </Label>
                <div className="md:col-span-2">
                    <LongTextField
                        label="Content"
                        value={translate(blogPost.content)}
                    />
                </div>
            </div>
        </PageCard>
    );
};

export default Show;
