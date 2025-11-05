import Input from "@/Components/form/fields/Input";
import TranslatableInput from "@/Components/form/fields/TranslatableInput";
import Form from "@/Components/form/Form";
import PageCard from "@/Components/ui/PageCard";
import TranslatableInputsContext from "@/Contexts/TranslatableInputsContext";
import TeamMember from "@/Models/TeamMember";
import { useForm } from "@inertiajs/react";
import { FormEvent } from "react";
import { translate } from "@/Models/Translatable";

const Edit = ({ teamMember }: { teamMember: TeamMember }) => {
    const { post, setData, processing } = useForm<{
        _method?: "PUT" | "POST";
        name: string;
        position: string;
        image?: File | undefined;
    }>({
        _method: "PUT",
        name: teamMember?.name,
        position: teamMember?.position,
    });

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
                            name="image"
                            label={"Image"}
                            onChange={(e) =>
                                setData("image", e.target.files?.[0])
                            }
                            type={"file"}
                            required
                        />
                    </div>
                </Form>
            </TranslatableInputsContext>
        </PageCard>
    );
};

export default Edit;
