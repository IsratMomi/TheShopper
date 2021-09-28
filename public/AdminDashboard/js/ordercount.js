function orderload(){
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

    $.ajax({
        url: '/order-load',
        method: "GET",
        success: function(response){
            $('.cus-orders').html('');
            var parsed = jQuery.parseJSON(response)
            var value = parsed;
            $('.cus-orders').append($('<i class="fa fa-list">'+ value['totalorder'] +'</i>'));
        }
    });
}


$(document).ready(function(){

    $('.place-order').click(function (e) {
        e.preventDefault();


      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        //alert(product_id);
       $.ajax({
            url: "/place-order",
            method: "POST",

            success: function (response) {
                alertify.set('notifier','position','bottom-right');
                alertify.success(response.status);
                orderload();
            },
        });
    });
});
