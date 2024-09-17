<script src="/dist/libs/apexcharts/dist/apexcharts.min.js" defer></script>
<script src="/dist/libs/jsvectormap/dist/js/jsvectormap.min.js" defer></script>
<script src="/dist/libs/jsvectormap/dist/maps/world.js" defer></script>
<script src="/dist/libs/jsvectormap/dist/maps/world-merc.js" defer></script>
<script src="/dist/js/tabler.min.js" defer></script>
<script src="/dist/js/demo.min.js" defer></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-5'), {
            chart: {
                type: "line",
                fontFamily: 'inherit',
                height: 24,
                animations: {
                    enabled: false
                },
                sparkline: {
                    enabled: true
                },
            },
            tooltip: {
                enabled: false,
            },
            stroke: {
                width: 2,
                lineCap: "round",
            },
            series: [{
                color: tabler.getColor("primary"),
                data: [2, 11, 15, 14, 21, 20, 8, 23, 18, 14]
            }],
        })).render();
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-6'), {
            chart: {
                type: "line",
                fontFamily: 'inherit',
                height: 24,
                animations: {
                    enabled: false
                },
                sparkline: {
                    enabled: true
                },
            },
            tooltip: {
                enabled: false,
            },
            stroke: {
                width: 2,
                lineCap: "round",
            },
            series: [{
                color: tabler.getColor("primary"),
                data: [22, 12, 7, 14, 3, 21, 8, 23, 18, 14]
            }],
        })).render();
    });
</script>
<script src="/dist/js/demo-theme.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $("#logout").click(function () {

            const xhttp = new XMLHttpRequest();
            result = window.confirm("do you want to log out of your account?");
            if (result) {
                xhttp.onload = function () {
                    window.confirm("you got out");
                    location.reload();
                }

                xhttp.open("GET", "/panel/logout", true);
                xhttp.send();
            }
        })
        
        let data = window.location.search.substring(1).trim();

        console.log(data);
        if (data === "login=true") {
            window.alert("welcome");
            location.replace("/panel");
        }
        else if (data === "login=false") {
            window.alert("info is incorrect");
        }
        else if (data === "login=nofill") {
            window.alert("some fildes are not set yet");
        }
        else if (data === "signup=true") {
            window.alert("welcome");
            location.replace("/panel");
        }
        else if (data === "signup=false") {
            window.alert("change username");
        }
        else if (data === "signup=nofill") {
            window.alert("some fildes are not set yet");
        }
    })
</script>