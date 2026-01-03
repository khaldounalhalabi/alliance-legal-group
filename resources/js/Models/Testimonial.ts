import Media from "@/Models/Media";
interface Testimonial {
    id: number;
    customer_name: string;
    customer_position?: string;
    testimonial: string;
}

export default Testimonial;
