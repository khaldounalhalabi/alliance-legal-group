import { usePage } from "@inertiajs/react";
import { MiddlewareProps } from "@/types";
import Swal from "sweetalert2";
import withReactContent from "sweetalert2-react-content";

export const asset = (path: string) => {
  if (path.startsWith("/")) {
    path = path.replace("/", "");
  }

  return `${usePage<MiddlewareProps>().props.asset}${path}`;
};

export function getNestedPropertyValue(object: any, path: string): any {
  const properties = path.split(".");
  let value = object;
  for (const property of properties) {
    if (value?.hasOwnProperty(property)) {
      value = value[`${property}`];
    } else {
      return undefined;
    }
  }
  return value;
}

export const swal = withReactContent(Swal);

export const getLocale = (): string => {
  const { currentLocale } = usePage<MiddlewareProps>().props;
  return currentLocale ?? "en";
};

export function toTitleCase(str: string): string {
    if (!str || typeof str !== 'string') {
        return '';
    }

    // 1. Convert the entire string to lowercase.
    let lowerStr = str.toLowerCase();

    // 2. Replace underscores and hyphens with spaces (to ensure they act as separators).
    //    This step is crucial if you want to remove the underscores from the output.
    lowerStr = lowerStr.replace(/[_-]/g, ' ');

    // 3. Use a regular expression to find the start of every word.
    //    - (\s|^) matches a whitespace character OR the start of the string.
    //    - (\w) matches the word character immediately following the separator.
    return lowerStr.replace(/(\s|^)(\w)/g, (match, separator, char) => {
        // We return the separator (space) followed by the capitalized character.
        return separator + char.toUpperCase();
    }).trim(); // .trim() handles leading/trailing spaces created by the replacements.
}
