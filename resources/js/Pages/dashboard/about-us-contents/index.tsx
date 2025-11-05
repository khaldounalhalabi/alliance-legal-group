import ActionsButtons from "@/Components/datatable/ActionsButtons";
import DataTable from "@/Components/datatable/DataTable";
import AboutUsContent from "@/Models/AboutUsContent";
import Http from "@/Modules/Http/Http";

const Index = () => {
    return (
        <DataTable
            title="About us content"
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
                Http.make<AboutUsContent[]>().get(
                    route("v1.web.protected.about.us.contents.data"),
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
                { name: "type", label: "Type", sortable: true },
                {
                    name: "content",
                    label: "Content",
                    translatable: true,
                    sortable: true,
                    headerProps: {
                        className: "w-[300px]",
                    },
                    cellProps: {
                        className: "max-w-[300px]",
                        style: {
                            overflow: "hidden",
                            whiteSpace: "nowrap",
                            textOverflow: "ellipsis",
                        },
                    },
                },
                {
                    label: "Options",
                    render: (_data, record, setHidden) => (
                        <ActionsButtons
                            buttons={["edit"]}
                            baseUrl={route(
                                "v1.web.protected.about.us.contents.index",
                            )}
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
