import ActionsButtons from "@/Components/datatable/ActionsButtons";
import DataTable from "@/Components/datatable/DataTable";
import ImagePreview from "@/Components/show/ImagePreview";
import Address from "@/Models/Address";
import Http from "@/Modules/Http/Http";

const Index = () => {
    return (
        <DataTable
            title="Address Table"
            createUrl={route("v1.web.protected.addresses.create")}
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
                Http.make<Address[]>().get(
                    route("v1.web.protected.addresses.data"),
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
                    name: "country",
                    label: "Country",
                    translatable: true,
                    sortable: true,
                },
                {
                    name: "city",
                    label: "City",
                    translatable: true,
                    sortable: true,
                },
                {
                    name: "address",
                    label: "Address",
                    translatable: true,
                    sortable: true,
                },
                {
                    name: "image",
                    label: "Image",
                    render(data) {
                        return (
                            <div className="aspect-square h-16 w-16">
                                <ImagePreview src={data.url} />
                            </div>
                        );
                    },
                },
                {
                    label: "Options",
                    render: (_data, record, setHidden, revalidate) => (
                        <ActionsButtons
                            buttons={["delete", "edit", "show"]}
                            baseUrl={route("v1.web.protected.addresses.index")}
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
