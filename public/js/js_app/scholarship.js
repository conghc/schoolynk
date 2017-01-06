$(document).ready(function(){
    $("#select-sponsor").chosen().change( function(e){
        sponsor_id = $(this).val();
        if(sponsor_id> 0){
            $('#loading-fixed').show();
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '/admin/info-sponsor',
                type: 'POST',
                data: {sponsor_id : sponsor_id},
                dataType: 'JSON',
                success: function (data) {
                    $('#account_information label.error').hide();
                    $('.ibc-hidden-sponsor, .col-hidden-sponsor').show();
                    $('.sponsor_name').val(data.name);
                    $('.sponsor_email').val(data.email);
                    $('#sponsor-logo').attr('src', '/' + data.img_profile);
                    $('#loading-fixed').hide();
                }
            });
        }
    } );

    $(".test_showtext .table-bordered tbody tr:first-child").addClass("black orange");
    $(".test_showtext .table-bordered tbody tr:first-child td:first-child").addClass("blue");
    $(".test_showtext .table-bordered tbody tr:nth-child(2)").addClass("black");
});