<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
    <style>
        .main {
            width: 100%;
            text-align: center;

        }

        td,
        th {
            border-top: 1px solid black;
            text-align: center;
        }
    </style>
    <table class="main">
        <tr>
            <td>
                PHP WITH AJAX
            </td>
        </tr>
        <tr>
            <td>
                <button id="loadAjax">
                    Load
                </button>
            </td>
        </tr>

        <tr>
            <td class="data_div">

            </td>
        </tr>
    </table>
    <script>
        $(document).ready(function () {
            function Fetch_data() {
                $.ajax({
                    url: "fetch.php",
                    type: "POST",
                    success: function (data) {
                        $('.data_div').html(data);
                    }
                })
            }
            $('#loadAjax').on('click', function () {
                Fetch_data();
            })
            Fetch_data();
        })
    </script>
</body>

</html>