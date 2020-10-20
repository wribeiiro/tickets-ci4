function colors(material = false) {
    const colors = {
        type1: ['#41B883', '#ff4d4d', '#fed330', '#7d5fff', '#4b4b4b', '#3ae374', '#17c0eb', '#00b894', '#fdcb6e', '#6AF9C4', '#4572A7'],
        type2: ['#01B8AA', '#374649', '#FD625E', '#F2C80F', '#5F6B6D', '#8AD4EB', '#FE9666', '#A66999', '#2b908f', '#aaeeee'],
        type3: ['#B5CA92', '#2b908f', '#90ee7e', '#f45b5b', '#7798BF', '#aaeeee', '#ff0066', '#eeaaee', '#DF5353', '#3ae374'],
        type4: ['#118DFF', '#750985', '#C83D95', '#FF985E', '#1DD5EE', '#42F7C0', '#3049AD', '#F64F5C', '#fed330', '#AA4643'],
        type5: ['#f368e0', '#ff6b6b', '#48dbfb', '#5f27cd', '#10ac84', '#576574', '#222f3e', '#341f97', '#01a3a4', '#ff9f43'],
        type6: ['#69f229', '#e2f202', '#2380cc', '#11bf34', '#ff512e', '#23ccbc', '#39b510', '#edcb1f', '#ff902e']
    };

    return colors.type1;
}


function setOptionsChart(material) {
    Highcharts.setOptions({
        chart: {
            backgroundColor: '#fff',
            fontFamily: 'Roboto Condensed'
        },
        colors: colors(material),
        /*ang: {
            decimalPoint: ',',
            thousandsSep: '.',
            viewFullscreen: '<i class="fa fa-expand"></i> Ver em Tela Cheia',
            printChart: '<i class="fa fa-print"></i> Imprimir',
            downloadPNG: null,
            downloadJPEG: '<i class="fa fa-file-image"></i> Baixar JPEG',
            downloadPDF: '<i class="fa fa-file-pdf"></i> Baixar PDF',
            downloadSVG: null,
            downloadCSV: '<i class="fa file-csv"></i> Baixar CSV',
            downloadXLS: '<i class="fa file-excel"></i> Baixar XLS',
            openInCloud: null,
            viewData: null,
            months: [
                'Janeiro', 'Fevereiro', 'Março', 'Abril',
                'Maio', 'Junho', 'Julho', 'Agosto',
                'Setembro', 'Outubro', 'Novembro', 'Dezembro'
            ],
            weekdays: [
                'Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira',
                'Quinta-Feira', 'Sexta-Feira', 'Sábado'
            ],
            shortMonths: ['Jan', 'Feb', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
        }*/
    })
}

function translateTable() {
    return  {
        "sEmptyTable": "Nenhum registro encontrado",
        "sInfo": "_START_ até _END_ de _TOTAL_",
        "sInfo": "",
        "sInfoEmpty": "Mostrando 0 até 0 de 0",
        "sInfoEmpty": "",
        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
        "sInfoPostFix": "",
        "sInfoThousands": ".",
        "sLengthMenu": "_MENU_",
        "sLoadingRecords": "Carregando...",
        "sProcessing": "Processando...",
        "sZeroRecords": "Nenhum registro encontrado",
        "sSearch": "",
        "oPaginate": {
            "sNext": ">>",
            "sPrevious": "<<",
            "sFirst": "Pri.",
            "sLast": "Últ."
        },
        "oAria": {
            "sSortAscending": ": Ordenar colunas de forma ascendente",
            "sSortDescending": ": Ordenar colunas de forma descendente"
        },
        "select": {
            "rows": {
                _: "%d Linhas Selecionadas",
                0: "Nenhuma Linha Selecionada",
                1: "1 Linha Selecionada"
            }
        }
    }
}

function geraChartLine(categories, jsonData, title) {

    setOptionsChart()

    Highcharts.chart('chartLinha', {
        title: {
            text: title
        },
        subtitle: {
            text: ''
        },
        yAxis: {
            title: {
                text: 'Total'
            }
        },
        xAxis: {
            categories: categories,
            crosshair: true,
            min: 0,
            max: jsonData.length -1,
            scrollbar: {
                enabled: false
            }
        },
        credits: {
            enabled: false
        },
        exporting: {
            enabled: true
        },
        series: [
            {
                name: 'Total',
                data: jsonData
            }
        ],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
}
