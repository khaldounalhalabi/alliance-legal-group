import Gallery from "@/Components/show/Gallery";
import SmallTextField from "@/Components/show/SmallTextField";
import { Label } from "@/Components/ui/labels-and-values/Label";
import PageCard from "@/Components/ui/PageCard";
import { Button } from "@/Components/ui/shadcn/button";
import TeamMember from "@/Models/TeamMember";
import { translate } from "@/Models/Translatable";
import { Link } from "@inertiajs/react";

const Show = ({ teamMember }: { teamMember: TeamMember }) => {
    return (
        <PageCard
            title={`Team member: ${translate(teamMember.name)}`}
            actions={
                <div className="flex items-center justify-between">
                    <Link
                        href={route(
                            "v1.web.protected.team.members.edit",
                            teamMember.id,
                        )}
                    >
                        <Button>Edit</Button>
                    </Link>
                </div>
            }
        >
            <div className="grid grid-cols-1 gap-5 md:grid-cols-2">
                <SmallTextField
                    label="Name"
                    value={translate(teamMember.name)}
                />
                <SmallTextField
                    label="Position"
                    value={translate(teamMember.position)}
                />
                <Label label={"Image"} col className={"md:col-span-2"}>
                    <Gallery sources={[teamMember?.image?.url]} />
                </Label>
            </div>
        </PageCard>
    );
};

export default Show;
