import TableCells from "@/Components/icons/TableCells";
import { NavMain } from "@/Components/nav-main";
import { NavUser } from "@/Components/nav-user";
import {
    Sidebar as ShadcnSidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from "@/Components/ui/shadcn/sidebar";
import { MiddlewareProps } from "@/types";
import { Link, usePage } from "@inertiajs/react";
import { type Icon } from "@tabler/icons-react";
import {
    BadgePlus,
    IdCardIcon,
    MessageCircleIcon,
    TableOfContentsIcon,
    TextIcon,
    UsersIcon,
} from "lucide-react";
import React from "react";

export function Sidebar({
    ...props
}: React.ComponentProps<typeof ShadcnSidebar>) {
    const sidebarItems: {
        title: string;
        href?: string;
        icon?: Icon;
        children?: {
            title: string;
            href?: string;
            icon?: Icon;
        }[];
    }[] = [
        {
            title: "About us content",
            href: route("v1.web.protected.about.us.contents.index"),
            icon: () => <TableOfContentsIcon />,
        },
        {
            title: "Team Members",
            href: route("v1.web.protected.team.members.index"),
            icon: () => <UsersIcon />,
        },
        {
            title: "Testimonials",
            href: route("v1.web.protected.testimonials.index"),
            icon: () => <TextIcon />,
        },
        {
            title: "Messages",
            href: route("v1.web.protected.messages.index"),
            icon: () => <MessageCircleIcon />,
        },
        {
            title: "Contact Us Page Content",
            href: route("v1.web.protected.contact.page.contents.index"),
            icon: () => <TableOfContentsIcon />,
        },
        {
            title: "Categorys",
            href: route("v1.web.protected.categories.index"),
            icon: () => <IdCardIcon />,
        },
    ];

    const { authUser } = usePage<MiddlewareProps>().props;
    return (
        <ShadcnSidebar collapsible="icon" {...props}>
            <SidebarHeader>
                <SidebarMenu>
                    <SidebarMenuItem>
                        <SidebarMenuButton
                            asChild
                            className="data-[slot=sidebar-menu-button]:!p-1.5"
                        >
                            <Link href={route("v1.web.protected.index")}>
                                <BadgePlus className="!size-5" />
                                <span className="text-base font-semibold">
                                    LMS Dashboard
                                </span>
                            </Link>
                        </SidebarMenuButton>
                    </SidebarMenuItem>
                </SidebarMenu>
            </SidebarHeader>
            <SidebarContent>
                <NavMain items={sidebarItems} />
            </SidebarContent>
            <SidebarFooter>
                <NavUser user={authUser} />
            </SidebarFooter>
        </ShadcnSidebar>
    );
}
