var tableTickets
var tableMyTickets

$(document).ready(() => {
    loadTableTickets(tableMyTickets, 'tableMyTickets')
    loadTableTickets(tableTickets, 'tableTickets')
})

function loadTableTickets(tableVar, tableId) {
    
    let url = `${BASE_URL}/tickets/getmytickets`

    if (tableId === 'tableTickets') url = `${BASE_URL}/tickets/gettickets`

    tableVar = $(`#${tableId}`).DataTable({
        sPaginationType: "full_numbers",
        destroy: false,
        searching: true,
        responsive: false,
        autoWidth: false,
        language: translateTable(),
        order: [[0, "DESC"]],
        ajax: {
            url: url,
            dataSrc: (data) => {
                return data || []
            },
            dataType: 'JSON',
            cache: true,
            error: (e) => {
                $("#btnSync").removeAttr("disabled").find("i").removeClass("fa-spinner fa-spin").addClass("fa-sync")
            },
            beforeSend: () => {
                $("#btnSync").attr("disabled", true).find("i").removeClass("fa-sync").addClass("fa-spinner fa-spin")
            },
            complete: () => {
                $("#btnSync").removeAttr("disabled").find("i").removeClass("fa-spinner fa-spin").addClass("fa-sync")
            }
        },
        lengthChange: false,
        pageLength: 50,
        columns: [
            {
                data: "id",
                width: "20px",
                class: "text-right",
            },
            {
                data: "created_date",
                class: "text-center",
                width: "50px"
            },
            {
                data: "client_name",
                width: "150px"
            },
            {
                data: "description",
                width: "350px",
                render: function (data, type, row, meta) {
                    return data.substring(0, 60)
                }
            },
            {
                data: "status",
                class: "text-center",
                width: "70px",
                render: function (data, type, row, meta) {
                    switch (parseInt(data)) {
                        case 0: return "Aguardando Atribuição"
                        case 1: return "Atribuído"
                        case 2: return "Em Execução"
                        case 3: return "Parado"
                        case 4: return "Encerrado"
                    }
                }
            },
            {
                data: "priority",
                class: "text-center",
                width: "70px"
            },
            {
                data: "module_name",
                class: "text-center",
                width: "70px",
                render: function (data, type, row, meta) {
                    return data.substring(0, 15)
                }
            },
            {
                data: "caller_name",
                class: "text-center",
                width: "70px",
                render: (data, type, row, meta) => {
                    return (data)
                }
            }
        ],
        dom: "Bfrtip",
        createdRow: function (row, data) {

            $('td', row).eq(5).css('background', '#f64f5c').css('color', '#fff')

            if (data.priority < 3)
                $('td', row).eq(5).css('background', '#79a7d0').css('color', '#fff')

            switch (parseInt(data.andamento)) {
                case 0: $('td', row).eq(4).css('background', '#dc8512').css('color', '#fff'); break
                case 1: $('td', row).eq(4).css('background', '#64738F').css('color', '#fff'); break
                case 2: $('td', row).eq(4).css('background', '#514cf7').css('color', '#fff'); break
                case 3: $('td', row).eq(4).css('background', '#f6c763').css('color', '#fff'); break
                case 4: $('td', row).eq(4).css('background', '#2ecc71').css('color', '#fff'); break
            }
        },
        initComplete: function () {
                
        }
    })

    const setEvents = (table, tableId) => {
        $(`#${tableId} .filters th`).each(function (idx, val) {
            $(this).html(`<input type="text" style="width: 100% !important;height: 24px !important; margin-bottom: 4px !important; border-radius: 3px !important" class="form-control hidden-xs" placeholder=""/>`)
        })

        table.columns().eq(0).each(function (index) {
            $('input', $(`#${tableId} .filters th`)[index]).on('keyup change', function () {
                table.column(index).search(this.value).draw()
            })
        })

        $(`#${tableId} tbody`).on('click', 'td', function() {

            let tr  = $(this).closest('tr')
            let row = table.row(tr)

            $('#modalTicket').modal()
        })
    }

    setEvents(tableVar, tableId)
}