(function displayPie() {
    jQuery(document).ready(function () {
        $.ajax({
            url: ajaxPath,
            type: 'GET'
        }).done(function (data) {
            console.log(data);
        });
    });

    var options = {
        //Boolean - Whether we should show a stroke on each segment
        segmentShowStroke: true,
        //String - The colour of each segment stroke
        segmentStrokeColor: "#fff",
        //Number - The width of each segment stroke
        segmentStrokeWidth: 2,
        //Number - The percentage of the chart that we cut out of the middle
        percentageInnerCutout: 50, // This is 0 for Pie charts

        //Number - Amount of animation steps
        animationSteps: 100,
        //String - Animation easing effect
        animationEasing: "easeOutBounce",
        //Boolean - Whether we animate the rotation of the Doughnut
        animateRotate: true,
        //Boolean - Whether we animate scaling the Doughnut from the centre
        animateScale: false
    }

    var data = [
        {
            value: 300,
            color: "rgb(247,70,74)",
            highlight: "rgba(247,70,74,0.8)",
            label: "En Cours"
        },
        {
            value: 50,
            color: "rgb(70,191,189)",
            highlight: "rgba(70,191,189,0.8)",
            label: "Terminés"
        },
        {
            value: 100,
            color: "rgb(253,180,92)",
            highlight: "rgba(253,180,92,0.8)",
            label: "En attente de validation"
        },
        {
            value: 100,
            color: "rgb(77,83,96)",
            highlight: "rgba(77,83,96,0.8)",
            label: "Archivés"
        }     
    ]
    
     var data2 = [
        {
            value: 100,
            color: "rgb(247,70,74)",
            highlight: "rgba(247,70,74,0.8)",
            label: "Language"
        },
        {
            value: 75,
            color: "rgb(70,191,189)",
            highlight: "rgba(70,191,189,0.8)",
            label: "Framework"
        },
        {
            value: 200,
            color: "rgb(253,180,92)",
            highlight: "rgba(253,180,92,0.8)",
            label: "CMS"
        },
        {
            value: 20,
            color: "rgb(77,83,96)",
            highlight: "rgba(77,83,96,0.8)",
            label: "Divers"
        }
    ]
    var ctx= $("#projectPie").get(0).getContext("2d");
    var ctx2 = $("#skillPie").get(0).getContext("2d");
    var myPieChart = new Chart(ctx).Pie(data, options);
    var myPieChart2 = new Chart(ctx2).Pie(data2, options);
})();