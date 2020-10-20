$(document).ready(() => {
    checkOptionsFilter()
    loadTicket()

    $('#ticketsFilter').submit((e) => {
        e.preventDefault()

        loadTicket()
    })
})

function loadTicket() {
    const yearMonth = `${$('#selectMonth option:selected').val()}${$('#selectYear option:selected').val()}`

    loadChartTickets(yearMonth)
    loadCardTickets(yearMonth)
    loadCard2Tickets()
}

function checkOptionsFilter() {
    const dateNow = new Date();
    const year = dateNow.getFullYear()
    let month = dateNow.getMonth() + 1

    if (month <= 9)
        month = `0${month}`

    $('#selectMonth').val(month)
    $('#selectYear').val(year)
}

function loadCardTickets(monthYear) {

    const populateCardsDash = (data = {}) => {
        counterjQuery(0, data.totalTickets || 0, 1100, "totalTickets")
        counterjQuery(0, data.totalTicketsMonth || 0, 1100, "totalTicketsMonth")
        counterjQuery(0, data.myTickets || 0, 1100, "myTickets")
        counterjQuery(0, data.myOpenTickets || 0, 1100, "openTickets")
        counterjQuery(0, data.ticketsMore30Days || 0, 1100, "ticketsMore30Days")
        $("#avgTickets").text(data.avgMonth || 0)

        const populateLastTicket = (dataTicket) => {
            $("#ticketId").html(`(${dataTicket.id})` || 0)
            $("#ticketClient").html(dataTicket.client || '')
            $("#ticketDate").html(dataTicket.created_date || '')
            $("#ticketDescription").html(`${dataTicket.description.substring(0, 75)}...` || '')
        }

        const populateTicketsLastMonth = (dataTicketLastMonth) => {

            const dataIcon1 = parseInt(data.totalTicketsMonth) > parseInt(dataTicketLastMonth.lastMonth) 
                ? `<span class="text-success"><i class="fw fa fa-arrow-down"></i> ${dataTicketLastMonth.lastMonth}</span>`
                : `<span class="text-danger"><i class="fw fa fa-arrow-up"></i> ${dataTicketLastMonth.lastMonth}</span>`

            const dataIcon2 = parseInt(data.myTickets) > parseInt(dataTicketLastMonth.myTickets)  
                ? `<span class="text-success"><i class="fw fa fa-arrow-down"></i> ${dataTicketLastMonth.myTickets}</span>`
                : `<span class="text-danger"><i class="fw fa fa-arrow-up"></i> ${dataTicketLastMonth.myTickets}</span>`

            $("#lastMonthTickets").html(`${dataIcon1}`)
            $("#lastMonthMyTickets").html(`${dataIcon2}`)
        }

        populateLastTicket(data.lastTicket || {})
        populateTicketsLastMonth(data.ticketsLastMonth)
    }
    
    const loaderCardsDash = () => {
        const strLoader = `<i class="fa fa-spinner fa-spin"></i>`
        const strLoader_ = `loading...` 
        $("#totalTickets").html(strLoader)
        $("#totalTicketsMonth").html(strLoader)
        $("#myTickets").html(strLoader)
        $("#openTickets").html(strLoader)
        $("#avgTickets").html(strLoader)
        $("#ticketsMore30Days").html(strLoader)
        
        const populateLastTicket = () => {
            $("#ticketId").html(strLoader_)
            $("#ticketClient").html(strLoader_)
            $("#ticketDate").html(strLoader_)
            $("#ticketDescription").html(strLoader_)
        }

        const populateCardsLastMonth = () => {
            $("#lastMonthTickets").html(strLoader)
            $("#lastMonthMyTickets").html(strLoader)
        }

        populateLastTicket()
        populateCardsLastMonth()
    }

    $.ajax({
        url: `${BASE_URL}/dashboard/getcardticket`,
        method: "GET",
        data: {
            monthYear: monthYear,
        },
        dataType: 'JSON',
        success: (data) => {
            populateCardsDash(data)
        },
        beforeSend: (b) => {
            loaderCardsDash()
            $("#searchTicket").attr('disabled', true).find("i").removeClass("fa-search").addClass("fa-spinner fa-spin")
        },
        complete: (c) => {
            $('#searchTicket').removeAttr('disabled').find('i').removeClass('fa-spinner fa-spin').addClass('fa-search')
        },
        error: (e) => {
            populateCardsDash()
            $('#searchTicket').removeAttr('disabled').find('i').removeClass('fa-spinner fa-spin').addClass('fa-search')
        }
    })
}

function loadChartTickets(monthYear) {
    $.ajax({
        url:  `${BASE_URL}/dashboard/getcharttickets`,
        method: "GET",
        data: {
            monthYear: monthYear
        },
        dataType: 'JSON',
        success: (data) => {
            geraChartLine(data.categories, data.data, `Total of tickets opened by day`)
        },
        beforeSend: (b) => {},
        complete: (c) => {
            $('#searchTicket').removeAttr('disabled').find('i').removeClass('fa-spinner fa-spin').addClass('fa-search')
        },
        error: (e) => {
            $('#searchTicket').removeAttr('disabled').find('i').removeClass('fa-spinner fa-spin').addClass('fa-search')
            console.log(e)
        }
    })
}

function loadCard2Tickets() {

    const populateCardsDash = (data = {}) => {

        const colorText = (input) => {
            if (input == 'cardArea')    return `text-secondary`
            if (input == 'cardClient')  return `text-primary`
            if (input == 'cardType')    return `text-success`
            if (input == 'cardModule')  return `text-warning`
        }

        let template = {
            cardArea: ``,
            cardClient: ``,
            cardType: ``,
            cardModule: ``
        }

        for (const i in data) {
            const obj = data[i];

            let j = 1

            for (const x in obj) {
                const item = obj[x]
                
                template[i] += `<div class="customer-message align-items-center">
                                    <a class="font-weight-bold" href="#">
                                        <div class="text-truncate message-title ${colorText(i)}"> ${item.total} tickets</div>
                                        <div class="small text-gray-500 message-time font-weight-bold">${j} - ${item.label}</div>
                                    </a>
                                </div>
                                `  
                j++
            }
        }
        
        for (const temp in template) {
            $(`#${temp}`).html(template[temp]).hide().fadeIn()
        }
    }
    
    const loaderCardsDash = (hide = false) => {
        const strLoader = `<div class="col-md-12 text-center mt-4"><i class="fa fa-spinner fa-spin"></i></div>`
        $("#cardArea").html(hide ? '' : strLoader)
        $("#cardClient").html(hide ? '' : strLoader)
        $("#cardType").html(hide ? '' : strLoader)
        $("#cardModule").html(hide ? '' : strLoader)
    }

    $.ajax({
        url: `${BASE_URL}/dashboard/getcard2ticket`,
        method: "GET",
        data: {},
        dataType: 'JSON',
        success: (data) => {
            populateCardsDash(data)
        },
        beforeSend: (b) => {
            loaderCardsDash()
        },
        complete: (c) => {
            $('#searchTicket').removeAttr('disabled').find('i').removeClass('fa-spinner fa-spin').addClass('fa-search')
        },
        error: (e) => {
            loaderCardsDash(true)
            $('#searchTicket').removeAttr('disabled').find('i').removeClass('fa-spinner fa-spin').addClass('fa-search')
        }
    })
}