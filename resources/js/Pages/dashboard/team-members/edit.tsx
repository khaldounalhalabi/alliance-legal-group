import ArrayFieldManager from "@/Components/form/ArrayFieldManager";
import Input from "@/Components/form/fields/Input";
import TranslatableInput from "@/Components/form/fields/TranslatableInput";
import TranslatableTextarea from "@/Components/form/fields/TranslatableTextarea";
import Form from "@/Components/form/Form";
import PageCard from "@/Components/ui/PageCard";
import TranslatableInputsContext from "@/Contexts/TranslatableInputsContext";
import TeamMember from "@/Models/TeamMember";
import { translate } from "@/Models/Translatable";
import { useForm } from "@inertiajs/react";
import { FormEvent, useState } from "react";

const Edit = ({ teamMember }: { teamMember: TeamMember }) => {
    const { post, setData, processing } = useForm<{
        _method?: "PUT" | "POST";
        name: string;
        position: string;
        summary?: string;
        education?: string;
        professional_background?: string;
        skills?: string[];
        practice_areas?: string[];
        bar_admissions?: string[];
        languages?: string[];
        achievements?: string[];
        email?: string;
        phone?: string;
        years_of_experience?: number;
        image?: File | undefined;
    }>({
        _method: "PUT",
        name: teamMember?.name,
        position: teamMember?.position,
        summary: teamMember?.summary,
        education: teamMember?.education,
        professional_background: teamMember?.professional_background,
        skills: teamMember?.skills || [],
        practice_areas: teamMember?.practice_areas || [],
        bar_admissions: teamMember?.bar_admissions || [],
        languages: teamMember?.languages || [],
        achievements: teamMember?.achievements || [],
        email: teamMember?.email,
        phone: teamMember?.phone,
        years_of_experience: teamMember?.years_of_experience,
    });

    const [skills, setSkills] = useState<string[]>(teamMember?.skills || []);
    const [practiceAreas, setPracticeAreas] = useState<string[]>(
        teamMember?.practice_areas || [],
    );
    const [barAdmissions, setBarAdmissions] = useState<string[]>(
        teamMember?.bar_admissions || [],
    );
    const [languages, setLanguages] = useState<string[]>(
        teamMember?.languages || [],
    );
    const [achievements, setAchievements] = useState<string[]>(
        teamMember?.achievements || [],
    );

    const onSubmit = (e: FormEvent<HTMLFormElement>) => {
        e.preventDefault();

        post(route("v1.web.protected.team.members.update", teamMember.id));
    };

    return (
        <PageCard title={`Edit Team Member: ${translate(teamMember.name)}`}>
            <TranslatableInputsContext>
                <Form onSubmit={onSubmit} processing={processing}>
                    <div
                        className={`grid grid-cols-1 items-start gap-5 md:grid-cols-2`}
                    >
                        <TranslatableInput
                            name="name"
                            label={"Name"}
                            onChange={(e) => setData("name", e.target.value)}
                            defaultValue={teamMember.name}
                            required
                        />
                        <TranslatableInput
                            name="position"
                            label={"Position"}
                            onChange={(e) =>
                                setData("position", e.target.value)
                            }
                            defaultValue={teamMember.position}
                            required
                        />
                        <Input
                            name="email"
                            label={"Email"}
                            type="email"
                            defaultValue={teamMember.email}
                            onChange={(e) => setData("email", e.target.value)}
                        />
                        <Input
                            name="phone"
                            label={"Phone"}
                            type="tel"
                            defaultValue={teamMember.phone}
                            onChange={(e) => setData("phone", e.target.value)}
                        />
                        <Input
                            name="years_of_experience"
                            label={"Years of Experience"}
                            type="number"
                            defaultValue={teamMember.years_of_experience?.toString()}
                            onChange={(e) =>
                                setData(
                                    "years_of_experience",
                                    parseInt(e.target.value) || 0,
                                )
                            }
                        />
                        <Input
                            name="image"
                            label={"Image"}
                            onChange={(e) =>
                                setData("image", e.target.files?.[0])
                            }
                            type={"file"}
                        />
                        <div className="md:col-span-2">
                            <TranslatableTextarea
                                name="summary"
                                label={"Summary / Bio"}
                                onChange={(e) =>
                                    setData("summary", e.target.value)
                                }
                                defaultValue={teamMember.summary}
                                rows={4}
                            />
                        </div>
                        <div className="md:col-span-2">
                            <TranslatableTextarea
                                name="education"
                                label={"Education"}
                                onChange={(e) =>
                                    setData("education", e.target.value)
                                }
                                defaultValue={teamMember.education}
                                rows={3}
                            />
                        </div>
                        <div className="md:col-span-2">
                            <TranslatableTextarea
                                name="professional_background"
                                label={"Professional Background"}
                                onChange={(e) =>
                                    setData(
                                        "professional_background",
                                        e.target.value,
                                    )
                                }
                                defaultValue={
                                    teamMember.professional_background
                                }
                                rows={5}
                            />
                        </div>
                        <ArrayFieldManager
                            label="Skills"
                            items={skills}
                            onUpdate={(items) => {
                                setSkills(items);
                                setData("skills", items);
                            }}
                            placeholder="Enter a skill (e.g., Contract Law)"
                        />
                        <ArrayFieldManager
                            label="Practice Areas"
                            items={practiceAreas}
                            onUpdate={(items) => {
                                setPracticeAreas(items);
                                setData("practice_areas", items);
                            }}
                            placeholder="Enter a practice area (e.g., Corporate Law)"
                        />
                        <ArrayFieldManager
                            label="Bar Admissions"
                            items={barAdmissions}
                            onUpdate={(items) => {
                                setBarAdmissions(items);
                                setData("bar_admissions", items);
                            }}
                            placeholder="Enter bar admission (e.g., New York State Bar)"
                        />
                        <ArrayFieldManager
                            label="Languages"
                            items={languages}
                            onUpdate={(items) => {
                                setLanguages(items);
                                setData("languages", items);
                            }}
                            placeholder="Enter a language (e.g., English)"
                        />
                        <ArrayFieldManager
                            label="Achievements & Awards"
                            items={achievements}
                            onUpdate={(items) => {
                                setAchievements(items);
                                setData("achievements", items);
                            }}
                            placeholder="Enter an achievement or award"
                        />
                    </div>
                </Form>
            </TranslatableInputsContext>
        </PageCard>
    );
};

export default Edit;
