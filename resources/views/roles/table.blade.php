<table class="table table-bordered table-striped table-hover ajaxTable datatable data-table" id="roles-table">
    <thead>
        <tr>
            <th style="color:white">x</th>
            <th>@lang('models/roles.fields.name')</th>
            <th>@lang('models/roles.fields.guard_name')</th>
            <th width="100px">@lang('crud.action')</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

@push('scripts')
    <script>
        $(function () {
            let table = $('.data-table').DataTable({
                "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                languages:{
                    url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
                },
                select:true,
                columnDefs: [ {
                    orderable: false,
                    className: 'select-checkbox',
                    targets:   0,
                    data: null,
                } ],
                select: {
                    style:    'multi',
                    selector: 'td:first-child'
                },
                dom: 'Bfrtip',
                buttons: [
                    'pageLength',
                    'selectAll',
                    'selectNone',
                    'colvis',
                    {

                        extend: 'copyHtml5',
                        title: '',
                        text: 'Copiar',
                        exportOptions: {
                            columns: function (idx, data, node) {
                                if (node.innerHTML == "x" || node.innerHTML == "Roles" || node.innerHTML == "Acciones" || node.hidden)
                                    return false;
                                return true;
                            }
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        title: '',
                        exportOptions: {
                            columns: function (idx, data, node) {
                                if (node.innerHTML == "x" || node.innerHTML == "Roles" || node.innerHTML == "Acciones" || node.hidden)
                                    return false;
                                return true;
                            }
                        }
                    },
                    {
                        extend: 'csvHtml5',
                        title: '',
                        exportOptions: {
                            columns: function (idx, data, node) {
                                if (node.innerHTML == "x" || node.innerHTML == "Roles" || node.innerHTML == "Acciones" || node.hidden)
                                    return false;
                                return true;
                            }
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        title: '',
                        exportOptions: {
                            columns: function (idx, data, node) {
                                if (node.innerHTML == "x" || node.innerHTML == "Roles" || node.innerHTML == "Acciones" || node.hidden)
                                    return false;
                                return true;
                            }
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Imprimir',
                        title: '',
                        exportOptions: {
                            columns: ':visible'/*
                            columns: function (idx, data, node) {
                                if (node.innerHTML == "x" || node.innerHTML == "Roles" || node.innerHTML == "Acciones" || node.hidden)
                                    return false;
                                return true;
                            }*/
                        }
                    },
                ],
                processing: true,
                serverSide: true,
                ajax: "{{ route('roles.index')}}",
                columns: [
                    { "data":null, render:function(){return "";}},
                    { data: 'name', name: 'name'},
                    { data: 'guard_name', name: 'guard_name'},
                    { data: 'action', name: 'Action', orderable: false, searchable: false},
                ],
                orderCellsTop: true,
                order: [[ 2, 'asc' ]],
                pageLength: 10,
            });
        })
    </script>
@endpush
