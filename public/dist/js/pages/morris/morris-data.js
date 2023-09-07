// Dashboard 1 Morris-chart
$(function () {
    "use strict";
Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: '2010',
            permanent: 50,
            nonpermanent: 80,
            itouch: 20
        }, {
            period: '2011',
            permanent: 130,
            nonpermanent: 100,
            itouch: 80
        }, {
            period: '2012',
            permanent: 80,
            nonpermanent: 60,
            itouch: 70
        }, {
            period: '2013',
            permanent: 70,
            nonpermanent: 200,
            itouch: 140
        }, {
            period: '2014',
            permanent: 180,
            nonpermanent: 150,
            itouch: 140
        }, {
            period: '2015',
            permanent: 105,
            nonpermanent: 100,
            itouch: 80
        },
         {
            period: '2016',
            permanent: 250,
            nonpermanent: 150,
            itouch: 200
        }],
        xkey: 'period',
        ykeys: ['permanent', 'nonpermanent'],
        labels: ['permanent', 'nonpermanent'],
        pointSize: 3,
        fillOpacity: 0,
        pointStrokeColors:['#5f76e8', '#01caf1'],
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        lineWidth: 3,
        hideHover: 'auto',
        lineColors: ['#5f76e8', '#01caf1'],
        resize: true
        
    });
 });    