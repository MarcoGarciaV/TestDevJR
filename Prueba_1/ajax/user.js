$(document).ready(function () {

    const users = () => {
        let data = {
            type: "getUsers"
        }
        $.ajax({
            type: "POST",
            url: "api/methods.php",
            data: data,
            success: function (response) {
                var jsonData = JSON.parse(response);
                $('#divTable').html(jsonData.data)
            },
            error: function (errMsg) {
                console.log(response);
            }

        });
    }

    users();

});



function Show(user_id) {
    let data = {
        user_id: user_id,
        type: 'getUsersById'
    }

    $.ajax({
        type: "POST",
        url: "api/methods.php",
        data: data,
        success: function (response) {

            var jsonData = JSON.parse(response);
            $('#form-modal').html(jsonData.data)
            $('#userModal').modal('show')
        },
        error: function (errMsg) {
            console.log(response)
        }

    });
}

