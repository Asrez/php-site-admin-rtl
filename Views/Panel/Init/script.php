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
        else if (data === "user_add=pass_error") {
            window.alert("passwords are not same");
        }
        else if (data === "user_add=true") {
            window.alert("new user added");
        }
        else if (data === "user_add=false") {
            window.alert("new user didn't add. change username");
        }
        else if (data === "userupdate=pass_error") {
            window.alert("password is incorrect");
        }
        else if (data === "userupdate=true") {
            window.alert("user updated");
        }
        else if (data === "userupdate=false") {
            window.alert("user didn't update. change username");
        }
        else if (data === "userupdate=nofill") {
            window.alert("some fildes are not set yet");
        }
        else if (data === "userdelete=true") {
            window.alert("user deleted");
        }
        else if (data === "setadmin=true") {
            window.alert("user set as admin");
        }
        else if (data === "adverupdate=true") {
            window.alert("advertisement updated");
        }
        else if (data === "adverupdate=nofill") {
            window.alert("some fildes are not set yet");
        }
        else if (data === "adverdelete=true") {
            window.alert("advertisement deleted");
        }
        else if (data === "settingupdate=true") {
            window.alert("setting updated");
        }
        else if (data === "settingupdate=nofill") {
            window.alert("some fildes are not set yet");
        }
        else if (data === "postadd=true") {
            window.alert("new post added");
        }
        else if (data === "postadd=nofill") {
            window.alert("some fildes are not set yet");
        }
        else if (data === "postupdate=true") {
            window.alert("post updated");
        }
        else if (data === "postupdate=nofill") {
            window.alert("some fildes are not set yet");
        }
        else if (data === "confirm=true") {
            window.alert("post confirmed");
        }
        else if (data === "postdelete=true") {
            window.alert("post deleted");
        }
        else if (data === "commentdelete=true") {
            window.alert("comment deleted");
        }
        else if (data === "commentconfirm=true") {
            window.alert("comment confirmed");
        }
    })
</script>