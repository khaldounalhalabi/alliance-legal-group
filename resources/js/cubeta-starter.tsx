import AuthLayout from "@/Components/layouts/AuthLayout";
import DashboardLayout from "@/Components/layouts/Layout";
import FatalErrorPage from "@/FatalError";
import ErrorBoundary from "@/Handlers/ErrorBoundry";
import { createInertiaApp } from "@inertiajs/react";
import React, { Suspense } from "react";
import { createRoot } from "react-dom/client";
import "../css/cubeta-starter.css";
import LandingLayout from "@/Components/landing/LandingLayout";

const appName = import.meta.env.VITE_APP_NAME || "Laravel";

const authPages = [
    "dashboard/login",
    "dashboard/forget-password",
    "dashboard/reset-password-code-form",
    "dashboard/reset-password",
];

type PageWithLayout = React.ComponentType & {
    layout?: (page: React.ReactNode) => React.ReactNode;
};

Promise.resolve()
    .then(() =>
        createInertiaApp({
            title: () => `${appName} Dashboard`,
            resolve: async (name: any) => {
                const pages = import.meta.glob<{
                    default: PageWithLayout;
                }>("./Pages/**/*.tsx", { eager: true });
                let page = pages[`./Pages/${name}.tsx`];

                if (!page) {
                    throw new Error(`Page "${name}" not found`);
                }

                page.default.layout =
                    !authPages.includes(name) && name.includes("dashboard")
                        ? (page) => <DashboardLayout>{page}</DashboardLayout>
                        : authPages.includes(name)
                          ? (page) => <AuthLayout>{page}</AuthLayout>
                          : (page) => <LandingLayout>{page}</LandingLayout>;

                return page;
            },
            setup({ el, App, props }) {
                const root = createRoot(el);

                root.render(
                    <ErrorBoundary>
                        <Suspense fallback={<div>Loading...</div>}>
                            <App {...props} />
                        </Suspense>
                    </ErrorBoundary>,
                );
            },
            progress: {
                color: "#4B5563",
            },
            defaults: {
                visitOptions: () => {
                    return { viewTransition: true };
                },
            },
        }),
    )
    .catch((error) => {
        const el =
            document.getElementById("app") ||
            document.body.appendChild(document.createElement("div"));
        const root = createRoot(el);
        root.render(<FatalErrorPage error={error} />);
    });
