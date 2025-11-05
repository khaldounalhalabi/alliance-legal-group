import Media from "@/Models/Media";
interface TeamMember {
    id: number;
    name: string;
    position: string;
    image?: Media | undefined;
}

export default TeamMember;
