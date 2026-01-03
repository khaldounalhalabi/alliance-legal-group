import Media from "@/Models/Media";
interface Address {
    id: number;
    country: string;
    city: string;
    address: string;
    map_link: string;
    image?: Media | undefined;
}

export default Address;
