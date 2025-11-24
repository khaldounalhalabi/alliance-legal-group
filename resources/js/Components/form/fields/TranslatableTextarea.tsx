import { Label } from "@/Components/ui/shadcn/label";
import { Textarea } from "@/Components/ui/shadcn/textarea";
import { LocaleContext } from "@/Contexts/TranslatableInputsContext";
import { getNestedPropertyValue } from "@/helper";
import { Translatable, translate } from "@/Models/Translatable";
import { MiddlewareProps } from "@/types";
import { usePage } from "@inertiajs/react";
import React, { ChangeEvent, useContext, useRef, useState } from "react";

interface TranslatableProps
    extends Omit<React.ComponentProps<"textarea">, "defaultValue"> {
    defaultValue?: string | object | Translatable | undefined;
    label?: string;
}

const TranslatableTextarea: React.FC<TranslatableProps> = ({
    label,
    className,
    defaultValue,
    onChange = undefined,
    onInput = undefined,
    name,
    required = false,
    ...props
}) => {
    const errors = usePage().props.errors;
    const error = name && errors[name] ? errors[name] : undefined;

    if (typeof defaultValue == "string") {
        defaultValue = translate(defaultValue, true);
    }

    const textRef = useRef<HTMLTextAreaElement>(null);

    const [value, setValue] = useState<object | undefined>(defaultValue ?? {});

    const locale = useContext(LocaleContext);
    const { availableLocales } = usePage<MiddlewareProps>().props;

    const handleChange = async (
        lang: string,
        e: ChangeEvent<HTMLTextAreaElement>,
    ) => {
        await setValue((prev) =>
            prev
                ? {
                      ...prev,
                      [lang]: e.target.value,
                  }
                : { [lang]: e.target.value },
        );

        if (textRef.current) {
            textRef.current.dispatchEvent(
                new Event("input", {
                    bubbles: true,
                }),
            );
        }
    };

    return (
        <div className={className ?? ""}>
            <textarea
                ref={textRef}
                name={name}
                value={JSON.stringify(value ?? "{}")}
                onInput={(e) => {
                    if (onChange) {
                        onChange(e as ChangeEvent<HTMLTextAreaElement>);
                    } else if (onInput) {
                        onInput(e as ChangeEvent<HTMLTextAreaElement>);
                    }
                }}
                className={"hidden"}
                hidden={true}
                readOnly={true}
                {...props}
            />
            {availableLocales.map((lang, index) => (
                <div
                    key={index}
                    className={
                        lang !== locale ? "hidden" : "flex flex-col gap-3"
                    }
                >
                    <Label htmlFor={`${name}_id`}>
                        {label} - {lang.toUpperCase()}
                        {required && (
                            <span className="text-sm text-destructive">*</span>
                        )}
                    </Label>
                    <Textarea
                        rows={4}
                        name={`${name}[${lang}]`}
                        defaultValue={
                            defaultValue
                                ? getNestedPropertyValue(defaultValue, lang)
                                : ""
                        }
                        onChange={(e) => handleChange(lang, e)}
                        required={required}
                        {...props}
                    />
                </div>
            ))}
            {error && <p className={"text-sm text-destructive"}>{error}</p>}
        </div>
    );
};

export default TranslatableTextarea;
