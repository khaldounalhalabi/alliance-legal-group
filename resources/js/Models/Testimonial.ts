import Media from "@/Models/Media";
interface Testimonial {
    id: number;
    customer_name: string;
    customer_position?: string;
    testimonial: string;
    customer_image?: Media | undefined;
}

export default Testimonial;
