<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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

        .pagination {
            width: 100%;
            text-align: right;
            margin-top: 5px;
        }

        .pagination>a {
            background-color: green;
            color: white;
            margin-right: 5px;
            text-decoration: none;
            padding: 3px 10px;

        }

        .pagination>.activate {
            background-color: navy;
        }
    </style>

    <!-- loader  -->
    <style>
        .loader {
            display: none;
            margin: 0 auto;
            width: 60px;
            height: 50px;
            text-align: center;
            font-size: 10px;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translateY(-50%) translateX(-50%);

            >div {
                height: 100%;
                width: 8px;
                display: inline-block;
                float: left;
                margin-left: 2px;
                -webkit-animation: delay 0.8s infinite ease-in-out;
                animation: delay 0.8s infinite ease-in-out;
            }

            .bar1 {
                background-color: #754fa0;
            }

            .bar2 {
                background-color: #09b7bf;
                -webkit-animation-delay: -0.7s;
                animation-delay: -0.7s;
            }

            .bar3 {
                background-color: #90d36b;
                -webkit-animation-delay: -0.6s;
                animation-delay: -0.6s;
            }

            .bar4 {
                background-color: #f2d40d;
                -webkit-animation-delay: -0.5s;
                animation-delay: -0.5s;
            }

            .bar5 {
                background-color: #fcb12b;
                -webkit-animation-delay: -0.4s;
                animation-delay: -0.4s;
            }

            .bar6 {
                background-color: #ed1b72;
                -webkit-animation-delay: -0.3s;
                animation-delay: -0.3s;
            }
        }


        @-webkit-keyframes delay {

            0%,
            40%,
            100% {
                -webkit-transform: scaleY(0.05)
            }

            20% {
                -webkit-transform: scaleY(1.0)
            }
        }

        @keyframes delay {

            0%,
            40%,
            100% {
                transform: scaleY(0.05);
                -webkit-transform: scaleY(0.05);
            }

            20% {
                transform: scaleY(1.0);
                -webkit-transform: scaleY(1.0);
            }
        }
    </style>
    <div class="loader" id="loader">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        <div class="bar4"></div>
        <div class="bar5"></div>
        <div class="bar6"></div>
    </div>
    <!-- searc input  -->
    <div class="row d-flex justify-content-end my-2">
        <div class="col-md-4">
            <form class="d-flex" role="search">
                <input class="form-control me-2" id="search_input" type="search" placeholder="Search"
                    aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
    <table class="main">
        <tr>
            <td>
                PHP WITH AJAX
            </td>

        </tr>
        <tr>

            <td>
                <form id="insert_form">


                    <label for="first">First Name</label>

                    <input type="text" id="first">
                    <label for="last"> Last Name </label>
                    <input type="text" id="last">
                    <button type="submit" id="ad_btn">Add</button>
                </form>
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

    <style>
        .edit_div {
            position: fixed;
            top: 5px;
            width: 100%;
            height: 100%;
            display: none;

        }

        .edit_div>div {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .edit_div>div>div {
            padding: 20px 60px;
            position: relative;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            background-color: white;
            text-align: center;
        }

        .edit_modal>div>i {
            position: absolute;
            top: -40px;
            right: -25px;
            font-size: 50px;
            color: red;
            cursor: pointer;
        }

        .edit_modal>div>i:hover {
            font-size: 49px;
            color: red;
        }

        .edit_modal> {
            background-color: red;
        }


        .edit_div>div>div>div>button {
            margin: 10px;
        }
    </style>
    <div class="edit_div" id="edit_div">
        <div id="edit_form">

        </div>
    </div>
    <!-- //bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {

            // feth data from table
            function Fetch_data(page) {
                $.ajax({
                    url: "try.php",
                    type: "POST",
                    data: {
                        page_no: page
                    },
                    beforeSend: function () {
                            $('#loader').fadeIn();
                        },
                    success: function (data) {
                        $('.data_div').html(data);
                        $('#loader').fadeOut();
                    }
                })
            }
            // Refresh data witj ajax
            $('#loadAjax').on('click', function () {
                Fetch_data();
            })
            Fetch_data(1);
            // Insert data with ajax 
            $('#ad_btn').on('click', function (e) {
                e.preventDefault;
                let fname = $('#first').val();
                let lname = $('#last').val();
                if (fname == "" || lname == "") {
                    alert('both fiels are required')
                }
                else {
                    $.ajax({
                        url: "insert.php",
                        type: "POST",
                        data: {
                            first_name: fname,
                            last_name: lname
                        },
                        beforeSend: function () {
                            $('#loader').fadeIn();

                        },
                        success: function (data) {
                            if (data == 1) {

                                Fetch_data()
                                $('#insert_form').trigger('reset');
                            }
                            else {
                                alert("not  Inserted")
                            }

                        }

                    })

                }
            })
            // deleted data with ajax
            $(document).on('click', '.del_btn', function () {
                let studen_id = $(this).data('id');
                // alert(studen_id);
                if (confirm('are you realy want to Delete this')) {
                    $.ajax({
                        url: "del.php",
                        type: "POST",
                        data: {
                            student: studen_id
                        },
                        success: function (data) {
                            if (data == 1) {
                                alert("deleted Succesfully");
                                Fetch_data(1);
                            }
                            else {
                                alert('server Error')
                            }
                        }
                    })
                }

            })
            // Update data with ajax 
            $(document).on('click', '.edit_btn', function () {
                $('#edit_div').slideDown();
                let studen_id = $(this).data('eid');
                $.ajax({
                    url: "edit.php",
                    type: "POST",
                    data: {
                        student: studen_id
                    },

                    success: function (data) {
                        $('#edit_form').html(data)
                    }
                })
            })
            //close Edit Modal
            $(document).on('click', '.close_btn', function () {
                $('#edit_div').slideUp();

            })
            //Edit button
            $(document).on('click', '.Edit_btn', function () {
                fname_edit = $('#fname_input').val();
                lname_edit = $('#lname_input').val();
                id = $('#user_id').val();
                if (fname_edit == "" || lname_edit == '') {
                    alert("both fiels are Required")
                }
                else {
                    $.ajax({
                        url: "update.php",
                        type: "POST",
                        data: {
                            user_id: id,
                            fname_edited: fname_edit,
                            lname_edited: lname_edit,
                        },
                        success: function (data) {
                            if (data == 1) {
                                $('#edit_div').fadeOut();
                                alert('updated Succesd')
                                Fetch_data(1)
                            }
                            else {
                                alert('server Error')
                            }
                        }
                    })
                }
            })
            //live Search 
            $('#search_input').on('keyup', function () {
                var search_text = $(this).val()
                if (search_text == '') {
                    Fetch_data(1)
                }
                else {
                    $.ajax({
                        url: 'live_search.php',
                        type: 'POST',
                        data: { search: search_text },
                        beforeSend: function () {
                            $('#loader').fadeIn();

                        },
                        success: function (data) {
                            $('.data_div').html(data);
                            $('#loader').fadeOut();
                        }
                    })
                }
            })
            //pagination
            $(document).on('click', '.pagination a', function (e) {
                e.preventDefault;
                let page_no = $(this).attr('id');
                Fetch_data(page_no);

            })

        })

    </script>
</body>

</html>