import { Button } from "@/Components/ui/shadcn/button";
import { MiddlewareProps } from "@/types";
import { usePage } from "@inertiajs/react";
import { createContext, ReactNode, useState } from "react";

export const LocaleContext = createContext<string>("en");

const TranslatableInputsContext = ({ children }: { children: ReactNode }) => {
    const { availableLocales, currentLocale } =
        usePage<MiddlewareProps>().props;
    const [locale, setLocale] = useState(currentLocale);

    return (
        <LocaleContext.Provider value={locale}>
            <div className="lang-btn-holder my-4 flex items-center justify-end">
                {availableLocales.map((lang, index) => (
                    <Button
                        size={"icon"}
                        className={`${currentLocale == "en" ? "first:rounded-r-none last:rounded-l-none" : "first:rounded-l-none last:rounded-r-none"}`}
                        variant={locale == lang ? "default" : "outline"}
                        onClick={() => setLocale(lang)}
                        key={index}
                        type={"button"}
                    >
                        {lang.toUpperCase()}
                    </Button>
                ))}
            </div>
            {children}
        </LocaleContext.Provider>
    );
};

export default TranslatableInputsContext;
