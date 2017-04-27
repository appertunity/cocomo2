/**
 * Created by Jaffar Raza on 10/21/2016.
 */

//Name
app.directive("saveMain", function(API_URL,$http,$compile,$q){
    return  function (scope, element, attrs) {
        $(element).click(function () {
            alert('sad')
            var error = true;
            return false;
            var url = API_URL + "get-images";
            $http({
                method: 'GET',
                url: url,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function successCallback(response) {
                $('.nav-stacked li').removeClass('active')
                $('#attr').removeClass('active').removeClass('in')
                if(!$('#images').length) {
                    $('.nav-stacked').append('<li><a data-toggle="pill" href="#images">'+$("#tab_img").html()+'</a></li>')
                    $('.tab-content').append('<div id="images" class="tab-pane fade in active"></div>')
                    $("#images").html($compile(response.data)(scope))
                }
                $('[href="#images"]').parent().addClass('active')
                $(".alert-warning").html($(".image_error_message").html()).fadeIn()
            }, function errorCallback(response) {});
        })
    }
});




