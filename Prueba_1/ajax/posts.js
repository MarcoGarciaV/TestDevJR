
$(document).ready(function () {

    var url = new URL(window.location.href);
    var user_id_param = url.searchParams.get("us");

    const posts = () => {



        let payload = {
            user_id: user_id_param,
            type: "getPostsByUserId"
        }
        $.ajax({
            type: "POST",
            url: "api/methods.php",
            data: payload,
            success: function (response) {
                var jsonData = JSON.parse(response);
                $('#divTablePosts').html(jsonData.data)
            },
            error: function (errMsg) {
                console.log(response);
            }

        });
    }

    posts();
});

function showComments(posts_id) {
    let data = {
        post_id: posts_id,
        type: 'getCommentsByPost'
    }

    $.ajax({
        type: "POST",
        url: "api/methods.php",
        data: data,
        success: function (response) {
            var jsonData = JSON.parse(response);
            $('#form-modal').html(jsonData.data)
            $('#commentsModal').modal('show')
        },
        error: function (errMsg) {
            console.log(response)
        }

    });
}

