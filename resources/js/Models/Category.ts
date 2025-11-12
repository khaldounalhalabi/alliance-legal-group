import Media from "@/Models/Media";
import Service from "@/Models/Service";
interface Category {
    id: number;
    name: string;
    description: string;
    cover?: Media | undefined;
    services?: Service[];
}

export default Category;
