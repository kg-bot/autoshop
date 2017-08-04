$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function changeContent(content)
{
    $(".main-content").empty().html(content);
    $('#carousel-example-generic').carousel();
    // This won't be fired each time, only if Audi category is in view
    $("#audi-alert").addClass("hidden");
}

$(".list-group #categories-select").change(function() {
    var category = $(this).val();

    $.ajax({
        url: '/',
        data: {'category': category},
        success: function(data) {
            changeContent(data);
        }
    })
})
$("#add-new-vehicle").validate({
    rules: {
        category: "required",
        name: "required",
        price: {
            required: true,
            integer: true
        },
        year: {
            required: true,
            integer: true,
            min: 1900,
            max: 2017
        },
        kilometers: {
            required: true,
            integer: true,
        },
        image: {
            required: true,
            accept: "image/*"
        }
    },
    messages: {
        image: {
            accept: "Only image files are allowed."
        }
    }
});
$("#add-new-vehicle input, #add-new-vehicle select").click(function() {
    console.log("select");
    $(this).next("label.error").remove();
})

/**
 * Used to submit logout form
 */
$("#logout").click(function(event){
    event.preventDefault();

    $("#logout-form").submit();
});

/**
 * Used to update Audi category
 */
$(document).on('click', "#update-audi", function() {
    $("#audi-alert").removeClass("hidden");
    $.ajax({
        url: '/audi',
        success: function(data) {
            changeContent(data);
        }
    })
})

/**
 * Used to delete vehicle from database
 */
$(document).on("click", ".delete-vehicle", function() {
    var id = $(this).data("id");
    var car_holder = $(this).parent().parent("tr");
    $.ajax({
        url: "/admin/delete",
        data: {"id": id},
        success: function(){
            $(car_holder).remove();
        }
    })
})

/**
 * Used to approve vehicle
 */
$(document).on("click", ".approve-vehicle", function() {
    var id = $(this).data("id");
    var element = $(this);
    $.ajax({
        url: "/admin/approve",
        data: {"id": id},
        success: function(){
            $(element).remove();
        }
    })
})