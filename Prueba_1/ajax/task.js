
$(document).ready(function () {

    var url = new URL(window.location.href);
    var user_id_param = url.searchParams.get("us");

    const comments = () => {
        let payload = {
            user_id: user_id_param,
            type: "getTasksByUser"
        }
        $.ajax({
            type: "POST",
            url: "api/methods.php",
            data: payload,
            success: function (response) {
                var jsonData = JSON.parse(response);
                $('#divTableComments').html(jsonData.data)
            },
            error: function (errMsg) {
                console.log(response);
            }

        });
    }

    /*BEGIN CREATE TASK*/
    $('#formTask').submit(function (e) {
        e.preventDefault();

        let data = $(this).serializeArray();

        let complete = (data.length === 2) ? data[1].value : "off"


        let payload = {
            userId: parseInt(user_id_param),
            title: data[0].value,
            completed: (complete === "on") ? true : false,
        }

        $.ajax({
            type: "POST",
            url: "https://jsonplaceholder.typicode.com/todos",
            data: payload,
            success: function (response) {
                console.log(response)
                $('#jsonSuccess').html(JSON.stringify(response));
                $('.alert-success').removeClass('d-none');
                setTimeout(() => {
                    $('.alert-success').addClass('d-none');
                }, 3000)

                // var jsonData = JSON. parse(response);
                // console.log(jsonData);
                // $('#divTableComments').html(jsonData.data)
            },
            error: function (errMsg) {
                console.log(response);
            }

        });
    });

    /*END CREATE TASK*/

    comments();
});



