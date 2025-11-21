import ActionsButtons from "@/Components/datatable/ActionsButtons";
import DataTable from "@/Components/datatable/DataTable";
import FrequentlyAskedQuestion from "@/Models/FrequentlyAskedQuestion";
import Http from "@/Modules/Http/Http";

const Index = () => {
    return (
        <DataTable
            title="Frequently Asked Questions"
            createUrl={route(
                "v1.web.protected.frequently.asked.questions.create",
            )}
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
                Http.make<FrequentlyAskedQuestion[]>().get(
                    route("v1.web.protected.frequently.asked.questions.data"),
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
                    name: "question",
                    label: "Question",
                    translatable: true,
                    sortable: true,
                },
                {
                    name: "answer",
                    label: "Answer",
                    translatable: true,
                    sortable: true,
                    render: (data) => (
                        <p
                            className={
                                "max-w-56 overflow-hidden text-nowrap text-ellipsis"
                            }
                        >
                            {data}
                        </p>
                    ),
                },
                {
                    label: "Options",
                    render: (_data, record, setHidden) => (
                        <ActionsButtons
                            buttons={["delete", "edit", "show"]}
                            baseUrl={route(
                                "v1.web.protected.frequently.asked.questions.index",
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
