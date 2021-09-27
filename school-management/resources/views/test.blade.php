<script src="{{asset('js/html2canvas.js')}}"></script>
<!-- Styles -->
<style>
    #chartdiv {
        width: 100%;
        height: 500px;
    }

</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
    am4core.ready(function() {

// Themes begin
        am4core.useTheme(am4themes_animated);
// Themes end

        var chart = am4core.create("chartdiv", am4charts.PieChart);
        chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

        chart.data = [
            {
                country: "Behaald",
                value: 12
            },
            {
                country: "Nog te behalen",
                value: 30
            },
            {
                country: "Niet behaald",
                value: 20
            }
        ];
        chart.radius = am4core.percent(70);
        chart.innerRadius = am4core.percent(40);
        chart.startAngle = 180;
        chart.endAngle = 360;

        var series = chart.series.push(new am4charts.PieSeries());
        series.dataFields.value = "value";
        series.dataFields.category = "country";

        series.slices.template.cornerRadius = 10;
        series.slices.template.innerCornerRadius = 7;
        series.slices.template.draggable = true;
        series.slices.template.inert = true;
        series.alignLabels = false;

        series.hiddenState.properties.startAngle = 90;
        series.hiddenState.properties.endAngle = 90;

        chart.legend = new am4charts.Legend();

    }); // end am4core.ready()
</script>

<!-- HTML -->
<div id="chartdiv"></div>

<button onclick="doCapture();">Capture</button>

<script>
    // A function to convert the required div to image
    function doCapture() {
        window.scrollTo(0, 0);

        html2canvas(document.getElementById("chartdiv")).then(function (canvas) {

            // Create an AJAX object
            var ajax = new XMLHttpRequest();

            // Setting method, server file name, and asynchronous
            ajax.open("POST", "../php/save-capture.php", true);

            // Setting headers for POST method
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            // Sending image data to server
            ajax.send("image=" + canvas.toDataURL("image/jpeg", 0.9));

            // Receiving response from server
            // This function will be called multiple times
            ajax.onreadystatechange = function () {

                // Check when the requested is completed
                if (this.readyState == 4 && this.status == 200) {

                    // Displaying response from server
                    console.log(this.responseText);
                }
            };
        });
    }
</script>




