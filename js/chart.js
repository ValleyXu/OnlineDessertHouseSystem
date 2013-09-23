$(function () {
    var chart,
        categories = ['0-20', '20-40', '40-60','60 +'];
    $(document).ready(function() {
        var options = {
            chart: {
                renderTo: 'container',
                type: 'bar'
            },
            title: {
                text: 'Population pyramid for Valley Dessert Member'
            },
            subtitle: {
                text: 'Valley Dessert'
            },
            xAxis: [{
                categories: categories,
                reversed: false
            }, { // mirror axis on right side
                opposite: true,
                reversed: false,
                categories: categories,
                linkedTo: 0
            }],
            yAxis: {
                title: {
                    text: null
                },
                labels: {
                    formatter: function(){
                        return (Math.abs(this.value)) ;
                    }
                },
                min: -50,
                max: 50
            },
    
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },
    
            tooltip: {
                formatter: function(){
                    return '<b>'+ this.series.name +', age '+ this.point.category +'</b><br/>'+
                        'Population: '+ Highcharts.numberFormat(Math.abs(this.point.y), 0);
                }
            },
    
            series: []
        };

        options.series = [];
        chart = new Highcharts.Chart(options);
    });
    
});