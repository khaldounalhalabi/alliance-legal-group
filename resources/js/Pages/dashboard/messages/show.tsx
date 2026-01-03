import LongTextField from "@/Components/show/LongTextField";
import SmallTextField from "@/Components/show/SmallTextField";
import PageCard from "@/Components/ui/PageCard";
import Message from "@/Models/Message";

const Show = ({ message_record }: { message_record: Message }) => {
    return (
        <PageCard title="Message Details">
            <div className="grid grid-cols-1 gap-5 md:grid-cols-2">
                <SmallTextField label="Name" value={message_record.name} />
                <SmallTextField
                    label="Email"
                    value={
                        <a href={`mailto:${message_record.email}`}>
                            {message_record.email}
                        </a>
                    }
                />
                <SmallTextField
                    label="Phone"
                    value={
                        <a href={`tel:${message_record.phone}`}>
                            {message_record.phone}
                        </a>
                    }
                />
                <div className={"md:col-span-2"}>
                    <LongTextField
                        label="Message"
                        value={message_record.message}
                    />
                </div>
            </div>
        </PageCard>
    );
};

export default Show;
