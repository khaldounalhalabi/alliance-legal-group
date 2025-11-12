import ActionsButtons from "@/Components/datatable/ActionsButtons";
import DataTable from "@/Components/datatable/DataTable";
import Service from "@/Models/Service";
import { translate } from "@/Models/Translatable";
import Http from "@/Modules/Http/Http";
import { Link } from "@inertiajs/react";

const Index = () => {
    return (
        <DataTable
            title="Services"
            createUrl={route("v1.web.protected.services.create")}
            getDataArray={(res) => res.data}
            getTotalPages={(res) => res?.paginate?.total_pages ?? 0}
            getTotalRecords={(res) => res.paginate?.total ?? 0}
            api={(
                page?: number | undefined,
                search?: string | undefined,
                sortCol?: string | undefined,
                sortDir?: string | undefined,
                perPage?: number | undefined,
                params?: object | undefined,
            ) =>
                Http.make<Service[]>().get(
                    route("v1.web.protected.services.data"),
                    {
                        page: page,
                        search: search,
                        sort_col: sortCol,
                        sort_dir: sortDir,
                        limit: perPage,
                        ...params,
                    },
                )
            }
            schema={[
                {
                    name: "id",
                    label: "ID",
                    sortable: true,
                },
                {
                    name: "name",
                    label: "Name",
                    translatable: true,
                    sortable: true,
                },
                {
                    name: "category.name",
                    label: "Category Name",
                    translatable: true,
                    render: (cell, record, setHidden, revalidate) => {
                        return (
                            record?.category_id && (
                                <Link
                                    className="underline hover:text-primary"
                                    href={route(
                                        "v1.web.protected.categories.show",
                                        record?.category_id,
                                    )}
                                >
                                    {translate(record?.category?.name)}
                                </Link>
                            )
                        );
                    },
                },
                {
                    label: "Options",
                    render: (_data, record, setHidden, revalidate) => (
                        <ActionsButtons
                            buttons={["delete", "edit", "show"]}
                            baseUrl={route("v1.web.protected.services.index")}
                            id={record?.id ?? 0}
                            setHidden={setHidden}
                        />
                    ),
                },
            ]}
        />
    );
};

export default Index;
