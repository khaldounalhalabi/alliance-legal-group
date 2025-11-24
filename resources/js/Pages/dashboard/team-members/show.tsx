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
                {teamMember.email && (
                    <SmallTextField label="Email" value={teamMember.email} />
                )}
                {teamMember.phone && (
                    <SmallTextField label="Phone" value={teamMember.phone} />
                )}
                {teamMember.years_of_experience && (
                    <SmallTextField
                        label="Years of Experience"
                        value={teamMember.years_of_experience.toString()}
                    />
                )}
                {teamMember.summary && (
                    <div className="md:col-span-2">
                        <SmallTextField
                            label="Summary / Bio"
                            value={translate(teamMember.summary)}
                        />
                    </div>
                )}
                {teamMember.education && (
                    <div className="md:col-span-2">
                        <SmallTextField
                            label="Education"
                            value={translate(teamMember.education)}
                        />
                    </div>
                )}
                {teamMember.professional_background && (
                    <div className="md:col-span-2">
                        <SmallTextField
                            label="Professional Background"
                            value={translate(
                                teamMember.professional_background,
                            )}
                        />
                    </div>
                )}
                {teamMember.skills && teamMember.skills.length > 0 && (
                    <div className="md:col-span-2">
                        <label className="mb-2 block text-sm font-medium text-gray-700">
                            Skills
                        </label>
                        <div className="flex flex-wrap gap-2">
                            {teamMember.skills.map((skill, index) => (
                                <span
                                    key={index}
                                    className="inline-flex items-center rounded-full bg-indigo-100 px-3 py-1 text-sm text-indigo-800"
                                >
                                    {skill}
                                </span>
                            ))}
                        </div>
                    </div>
                )}
                {teamMember.practice_areas &&
                    teamMember.practice_areas.length > 0 && (
                        <div className="md:col-span-2">
                            <label className="mb-2 block text-sm font-medium text-gray-700">
                                Practice Areas
                            </label>
                            <div className="flex flex-wrap gap-2">
                                {teamMember.practice_areas.map(
                                    (area, index) => (
                                        <span
                                            key={index}
                                            className="inline-flex items-center rounded-full bg-blue-100 px-3 py-1 text-sm text-blue-800"
                                        >
                                            {area}
                                        </span>
                                    ),
                                )}
                            </div>
                        </div>
                    )}
                {teamMember.bar_admissions &&
                    teamMember.bar_admissions.length > 0 && (
                        <div className="md:col-span-2">
                            <label className="mb-2 block text-sm font-medium text-gray-700">
                                Bar Admissions
                            </label>
                            <div className="flex flex-wrap gap-2">
                                {teamMember.bar_admissions.map((bar, index) => (
                                    <span
                                        key={index}
                                        className="inline-flex items-center rounded-full bg-green-100 px-3 py-1 text-sm text-green-800"
                                    >
                                        {bar}
                                    </span>
                                ))}
                            </div>
                        </div>
                    )}
                {teamMember.languages && teamMember.languages.length > 0 && (
                    <div className="md:col-span-2">
                        <label className="mb-2 block text-sm font-medium text-gray-700">
                            Languages
                        </label>
                        <div className="flex flex-wrap gap-2">
                            {teamMember.languages.map((lang, index) => (
                                <span
                                    key={index}
                                    className="inline-flex items-center rounded-full bg-purple-100 px-3 py-1 text-sm text-purple-800"
                                >
                                    {lang}
                                </span>
                            ))}
                        </div>
                    </div>
                )}
                {teamMember.achievements &&
                    teamMember.achievements.length > 0 && (
                        <div className="md:col-span-2">
                            <label className="mb-2 block text-sm font-medium text-gray-700">
                                Achievements & Awards
                            </label>
                            <ul className="list-inside list-disc space-y-1">
                                {teamMember.achievements.map(
                                    (achievement, index) => (
                                        <li key={index} className="text-sm">
                                            {achievement}
                                        </li>
                                    ),
                                )}
                            </ul>
                        </div>
                    )}
                <Label label={"Image"} col className={"md:col-span-2"}>
                    <Gallery sources={[teamMember?.image?.url]} />
                </Label>
            </div>
        </PageCard>
    );
};

export default Show;
