import TiptapEditor from "@/Components/form/fields/tiptap/TiptapEditor";
import { Label } from "@/Components/ui/shadcn/label";
import { LocaleContext } from "@/Contexts/TranslatableInputsContext";
import { getNestedPropertyValue } from "@/helper";
import { Translatable, translate } from "@/Models/Translatable";
import { MiddlewareProps } from "@/types";
import { usePage } from "@inertiajs/react";
import { Editor } from "@tiptap/react";
import React, { ChangeEvent, useContext, useRef, useState } from "react";

interface TranslatableProps
    extends Omit<React.ComponentProps<"textarea">, "defaultValue"> {
    defaultValue?: string | object | Translatable | undefined;
    extraButtons?: (editor: Editor) => React.ReactNode;
    label?: string;
}

const TranslatableTextEditor: React.FC<TranslatableProps> = ({
    label,
    defaultValue,
    onChange = undefined,
    onInput = undefined,
    name,
    required = false,
    extraButtons,
}) => {
    const { errors } = usePage<MiddlewareProps>().props;
    const error = name && errors[name] ? errors[name] : undefined;

    if (typeof defaultValue == "string") {
        defaultValue = translate(defaultValue, true);
    }

    const textRef = useRef<HTMLTextAreaElement>(null);

    const [value, setValue] = useState<object | undefined>(defaultValue ?? {});

    const selectedLocale = useContext(LocaleContext);
    const { availableLocales } = usePage<MiddlewareProps>().props;

    const handleChange = async (lang: string, e: string) => {
        await setValue((prev) =>
            prev
                ? {
                      ...prev,
                      [lang]: e,
                  }
                : { [lang]: e },
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
        <div>
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
            />
            {availableLocales.map((lang, index) => (
                <Label
                    key={index}
                    className={
                        lang !== selectedLocale
                            ? "hidden"
                            : "flex flex-col items-start gap-3"
                    }
                    htmlFor={`${name}[${lang}]_${label}_${lang.toUpperCase()}_id`}
                >
                    <span>
                        {label && `${label} - ${lang.toUpperCase()}`}
                        {required && (
                            <span className="text-sm text-destructive">*</span>
                        )}
                    </span>
                    <TiptapEditor
                        id={`${name}[${lang}]_${label}_${lang.toUpperCase()}_id`}
                        defaultValue={
                            defaultValue
                                ? getNestedPropertyValue(defaultValue, lang)
                                : undefined
                        }
                        onChange={(e) => handleChange(lang, e)}
                        extraButtons={extraButtons}
                    />
                </Label>
            ))}
            {error && <p className={"text-sm text-destructive"}>{error}</p>}
        </div>
    );
};

export default TranslatableTextEditor;
