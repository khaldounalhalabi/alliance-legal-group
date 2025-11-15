import Media from "@/Models/Media";
interface BlogPost {
    id: number;
    title: string;
    small_description: string;
    content: string;
    author_name: string;
    cover?: Media | undefined;
}

export default BlogPost;
