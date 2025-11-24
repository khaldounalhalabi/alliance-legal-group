import Media from "@/Models/Media";
interface TeamMember {
    id: number;
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
    image?: Media | undefined;
}

export default TeamMember;
