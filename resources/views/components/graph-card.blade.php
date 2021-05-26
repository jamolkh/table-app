<div class="w-full md:w-1/2 xl:w-1/3 p-6">
    <!--Graph Card-->
    <div class="bg-white border-transparent rounded-lg shadow-xl">
        <div class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
            <h5 class="font-bold uppercase text-gray-600">Graph</h5>
        </div>
        <div class="p-5">
            <canvas id="chartjs-0" class="chartjs" width="undefined" height="undefined"></canvas>
            <script>
                new Chart(document.getElementById("chartjs-0"), {
                    "type": "line",
                    "data": {
                        "labels": ["January", "February", "March", "April", "May", "June", "July","August","September","October", "November", "December"],
                        "datasets": [{
                            "label": "Views",
                            "data": [0, 59, 80, 81, 56, 55, 40, 50, 60, 80, 95, 110],
                            "fill": false,
                            "borderColor": "rgb(75, 192, 192)",
                            "lineTension": 0.1
                        }]
                    },
                    "options": {}
                });
            </script>
        </div>
    </div>
    <!--/Graph Card-->
</div>
