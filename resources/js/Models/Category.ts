import Media from "@/Models/Media";
interface Category {
    id: number;
    name: string;
    description: string;
    cover?: Media | undefined;
}

export default Category;
