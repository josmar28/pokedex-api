$(function () {

    var chart1 = c3.generate({
        bindto: '#ppchart',
        data: {
            columns: [
                ['MSD', 250],
                ['LHSD', 150],
                ['RLED', 100],
                ['PDOHO',50],
                ['OTHERS',50]
            ],

            type: 'donut',
            tooltip: {
                show: true
            }
        },
        donut: {
            label: {
                show: false
            },
            title: 'Personnel Population Chart',
            width: 18
        },
        color: {
            pattern: [
                '#edf2f6',
                '#5f76e8',
                '#ff4f70',
                '#01caf1',
                '#880808'
            ]
        }
    });

    d3.select('#ppchart .c3-chart-arcs-title').style('font-family', 'Rubik');
})