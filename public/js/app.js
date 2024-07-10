$(document).ready(function () {
    //Get all country when page load
    $.ajax({
        url: 'https://countriesnow.space/api/v0.1/countries/flag/images',
        type: 'GET',
        success: function (response) {
            if (response.error) {
                $('#inputGroupSelectCountry').append('<option value="">Không có thành phố nào</option>');
            } else {
                $.each(response.data, function (index, country) {
                    $('#inputGroupSelectCountry').append('<option value="' + country.name + '">' + country.name + '</option>');
                });
            }
        },
        error: function (error) {
            console.log('Error:', error);
        },
    });
});

// Get city and generate to input

$('#inputGroupSelectCountry').change(function () {
    $('#inputGroupSelectCity').prop('disabled', true);
    $('#inputGroupSelectCity').html('<option value="">Choose a City</option>');
    var country = $(this).val();
    $.ajax({
        url: 'https://countriesnow.space/api/v0.1/countries/cities',
        type: 'POST',
        contentType: 'application/json',
        dataType: 'json',
        data: JSON.stringify({ country: country }),
        success: function (response) {
            if (response.error) {
                $('#inputGroupSelectCity').append($('#inputGroupSelectCity').html('<option value="">Không có thành phố nào</option>'));
            } else {
                $.each(response.data, function (index, city) {
                    $('#inputGroupSelectCity').append('<option value="' + city + '">' + city + '</option>');
                });
            }
            console.log(response.data); // In ra danh sách các quốc gia trong console
        },
        error: function (error) {
            console.log('Error:', error);
        },
        complete: function () {
            // Re-enable input after data is loaded (whether success or error)
            $('#inputGroupSelectCity').prop('disabled', false);
        },
    });
});

//Date picker register auth
$(function () {
    $('#authRegisterBirthday').daterangepicker(
        {
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'), 10),
        },
        function (start, end, label) {
            var years = moment().diff(start, 'years');
            $('#authRegisterBirthday').val(start);
        },
    );
});

//Status post change

// $("#inputGroupSelectStatus").change(function () {
//     var status = $(this).val();
//     var url = '{{ route("post.index", ":status") }}';
//     url = url.replace(":status", status);
//     $.ajax({
//         url: url,
//         type: "get",
//         success: function (response) {
//             $(".table tbody").html(response);
//         },
//         error: function (error) {
//             console.log("Error:", error);
//         },
//         complete: function () {},
//     });
// });

//modal
$(document).ready(function () {
    $('#errorModal').modal('show');
});
