// Load the Visualization API and the piechart package.
google.load('visualization', '1.0', {'packages': ['corechart']});

// Set a callback to run when the Google Visualization API is loaded.
google.setOnLoadCallback(drawChart);

// Callback that creates and populates a data table,
// instantiates the pie chart, passes in the data and
// draws it.
function drawChart() {

    $.ajax({
        url: ajaxPath,
        type: 'POST',
        data: {title: skillName, id: id}
    }).done(
            console.log()
            );


    // Create the data table.
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Topping');
    data.addColumn('number', 'Slices');
    data.addRows([
        ['En cours', 7],
        ['Terminés', 1],
        ['En attente de validation', 1],
        ['Archivés', 1]
    ]);

    // Set chart options
    var options = {'title': 'Projets',
        'width': 400,
        'height': 300};

    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}