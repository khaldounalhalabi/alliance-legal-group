import Category from "@/Models/Category";
import Media from "@/Models/Media";
interface Service {
    id: number;
    name: string;
    description: string;
    category_id: number;
    cover?: Media | undefined;
    image?: Media | undefined;
    category?: Category;
}

export default Service;
