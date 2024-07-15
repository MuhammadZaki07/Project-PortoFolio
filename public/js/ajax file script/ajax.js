$(document).ready(function () {
    $("#search").on("keyup", function () {
        searchPosts();
        searchUsers();
        searchCertificate();
        searchProject();
    });

    function searchProject(){
        var query = $("#search").val();
        var route = "/search/project";

        $.ajax({
            url: route,
            type:"GET",
            data:{search:query},
            success:function(data){
                $("#project-results").html(data)
            },
            error:function(xhr,status,error){
                console.error(xhr.status + ': ' + xhr.statusText);
            }

        });
    }


    function searchCertificate() {
        var query = $("#search").val();
        var route = "/search/certificate";

        $.ajax({
            url: route,
            type: "GET",
            data: {
                search: query,
            },
            success: function (data) {
                $("#certificate-results").html(data);
            },
            error: function (xhr, status, error) {
                console.log(error);
            },
        });
    }

    function searchPosts() {
        var query = $("#search").val();
        var route = "/posts/search";

        $.ajax({
            url: route,
            type: "GET",
            data: {
                search: query,
            },
            success: function (data) {
                $("#post-results").html(data);
            },
            error: function (xhr, status, error) {
                console.error(error);
            },
        });
    }

    function searchUsers() {
        var query = $("#search").val();
        var route = "/search";

        $.ajax({
            url: route,
            type: "GET",
            data: {
                search: query,
            },
            success: function (data) {
                $("#users-results").html(data);
            },
            error: function (xhr, status, error) {
                console.log(error);
            },
        });
    }
});
