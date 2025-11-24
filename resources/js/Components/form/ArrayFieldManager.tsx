import { Badge } from "@/Components/ui/shadcn/badge";
import { Button } from "@/Components/ui/shadcn/button";
import { Input } from "@/Components/ui/shadcn/input";
import { Label } from "@/Components/ui/shadcn/label";
import { X } from "lucide-react";
import { useState } from "react";

interface ArrayFieldManagerProps {
    label: string;
    items: string[];
    onUpdate: (items: string[]) => void;
    placeholder?: string;
}

const ArrayFieldManager = ({
    label,
    items,
    onUpdate,
    placeholder = "Enter an item and press Enter or click Add",
}: ArrayFieldManagerProps) => {
    const [input, setInput] = useState("");

    const addItem = () => {
        if (input.trim() && !items.includes(input.trim())) {
            const newItems = [...items, input.trim()];
            onUpdate(newItems);
            setInput("");
        }
    };

    const removeItem = (itemToRemove: string) => {
        const newItems = items.filter((item) => item !== itemToRemove);
        onUpdate(newItems);
    };

    return (
        <div className="md:col-span-2">
            <Label className="mb-2">{label}</Label>
            <div className="mb-3 flex gap-2">
                <Input
                    type="text"
                    value={input}
                    onChange={(e) => setInput(e.target.value)}
                    onKeyPress={(e) => {
                        if (e.key === "Enter") {
                            e.preventDefault();
                            addItem();
                        }
                    }}
                    className="flex-1"
                    placeholder={placeholder}
                />
                <Button type="button" onClick={addItem}>
                    Add
                </Button>
            </div>
            <div className="flex flex-wrap gap-2">
                {items.map((item, index) => (
                    <Badge key={index} variant="secondary" className="gap-1">
                        {item}
                        <Button
                            type="button"
                            variant="ghost"
                            size="icon"
                            className="h-4 w-4 p-0 hover:bg-transparent"
                            onClick={() => removeItem(item)}
                        >
                            <X className="h-3 w-3" />
                        </Button>
                    </Badge>
                ))}
            </div>
        </div>
    );
};

export default ArrayFieldManager;
