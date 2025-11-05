import Input, { InputProps } from "@/Components/form/fields/Input";
import { LocaleContext } from "@/Contexts/TranslatableInputsContext";
import {
    AvailableLocales,
    Translatable,
    translate,
} from "@/Models/Translatable";
import { MiddlewareProps } from "@/types";
import { usePage } from "@inertiajs/react";
import React, { ChangeEvent, useContext, useRef, useState } from "react";

interface ITranslatableInputProps {
    defaultValue?: string | Translatable | Record<string, string> | undefined;
    onChange?: (e: ChangeEvent<HTMLInputElement>) => void;
    onInput?: (e: ChangeEvent<HTMLInputElement>) => void;
    required?: boolean;
}

const TranslatableInput: React.FC<
    Omit<InputProps, "defaultValue" | "onChange" | "onInput"> &
        ITranslatableInputProps
> = ({
    name,
    label,
    type,
    defaultValue,
    className,
    placeholder = "",
    onChange = undefined,
    onInput = undefined,
    required = false,
    ...props
}) => {
    const selectedLocale = useContext(LocaleContext);
    const { availableLocales } = usePage<MiddlewareProps>().props;
    const inputRef = useRef<HTMLInputElement>(null);

    const errors = usePage().props.errors;
    const error = name && errors[name] ? errors[name] : undefined;

    if (typeof defaultValue == "string") {
        defaultValue = translate(defaultValue, true);
    }

    const [value, setValue] = useState<object | undefined | Translatable>(
        defaultValue ?? undefined,
    );

    const handleChange = async (
        e: ChangeEvent<HTMLInputElement>,
        lang: string | keyof Translatable,
    ) => {
        await setValue((prev) =>
            prev
                ? {
                      ...prev,
                      [lang]: e.target.value,
                  }
                : { [lang]: e.target.value },
        );
        inputRef?.current?.dispatchEvent(new Event("input", { bubbles: true }));
    };

    return (
        <div className={"grid w-full items-center gap-3"}>
            <input
                ref={inputRef}
                value={JSON.stringify(value ?? {})}
                readOnly={true}
                className={"hidden"}
                onInput={(e) => {
                    if (onChange) {
                        onChange(e as ChangeEvent<HTMLInputElement>);
                    } else if (onInput) {
                        onInput(e as ChangeEvent<HTMLInputElement>);
                    }
                }}
                name={name}
            />
            {availableLocales.map((lang, index) => {
                return (
                    <div
                        key={index}
                        className={`${selectedLocale != lang ? "hidden" : ""} m-0 p-0`}
                    >
                        <Input
                            name={`${name}[${lang}]`}
                            label={`${label} - ${lang.toUpperCase()}`}
                            defaultValue={
                                defaultValue
                                    ? defaultValue[lang as AvailableLocales]
                                    : ""
                            }
                            type={"text"}
                            placeholder={placeholder}
                            onInput={(e) => handleChange(e, lang)}
                            {...props}
                        />
                    </div>
                );
            })}
            {error && <p className={"text-sm text-red-700"}>{error}</p>}
        </div>
    );
};

export default TranslatableInput;
