import ActionsButtons from "@/Components/datatable/ActionsButtons";
import DataTable from "@/Components/datatable/DataTable";
import Message from "@/Models/Message";
import Http from "@/Modules/Http/Http";

const Index = () => {
    return (
        <DataTable
            title="Messages Table"
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
                Http.make<Message[]>().get(
                    route("v1.web.protected.messages.data"),
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
                { name: "name", label: "Name", sortable: true },
                { name: "phone", label: "Phone", sortable: true },
                { name: "address", label: "Address", sortable: true },
                {
                    label: "Options",
                    render: (_data, record, setHidden, revalidate) => (
                        <ActionsButtons
                            buttons={["delete", "show"]}
                            baseUrl={route("v1.web.protected.messages.index")}
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
