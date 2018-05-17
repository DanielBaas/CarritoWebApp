window.onload = function () {
    //Gráfica de línea para el total de ventas mensusales
    new Chart(document.getElementById("graficaLinea"), {
        type: 'line',
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            datasets: [{
                data: [6412, 6541, 7425, 7457],
                label: "2018",
                borderColor: "#3e95cd",
                fill: false,
                pointRadius: 8,
                pointHoverRadius: 12
            }, {
                data: [6525, 7220, 5412, 6022, 6354, 8019, 6245, 5702, 6700, 5567, 6421, 7952],
                label: "2017",
                borderColor: "#8e5ea2",
                fill: false,
                pointRadius: 8,
                pointHoverRadius: 12
            }, {
                data: [5512, 5621, 5876, 6548, 6584, 5658, 6845, 6896, 6895, 7343, 7458, 7542],
                label: "2016",
                borderColor: "#3cba9f",
                fill: false,
                pointRadius: 8,
                pointHoverRadius: 12
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Total de ventas por mes'
            }
        }
    });
}
