$(document).ready(function(){
    // add faculty and school
    $('.add-more-faculty').click(function(){
        $( ".child-faculty" ).each(function( index ) {
            $(this).find('.name_faculty').attr('name', 'structure['+ (index + 1) +'][name_faculty]');
            $(this).find('.list-school').attr('stt', (index + 1));
        });
        count = $('.child-faculty').length + 1;
        html_faculty = '<div class="form-group child-faculty">';
        html_faculty += '<div class="col-sm-1"><a class="btn btn-white" onclick="removeElem(this);"><i class="fa fa-minus"></i></a></div>';
        html_faculty += '<div class="col-sm-8">';
        html_faculty += '<input type="text" name="structure['+ count +'][name_faculty]" class="form-control name_faculty">';
        html_faculty += '<div class="list-school" stt="'+ count +'">';
        html_faculty += '<div class="child-school">';
        html_faculty += '<div class="col-sm-1"></div>';
        html_faculty += '<div class="col-sm-7"><input type="text" name="structure['+ count +'][school][1][name_school]" class="form-control name_school"></div>';
        html_faculty += '<div class="col-sm-4">';
        html_faculty += '<select class="form-control m-b s_child" name="structure['+ count +'][school][1][child]"><option value="undergraduate">Undergraduate</option><option value="graduate">Graduate</option></select>';
        html_faculty += '</div></div>';
        html_faculty += '</div>';
        html_faculty += '<div>';
        html_faculty += '<div class="col-sm-1"></div>';
        html_faculty += '<div class="col-sm-11">';
        html_faculty += '<button onclick="addMoreSchool(this);" type="button" class="btn btn-primary btn-xs">'+ add_more_school +'</button>';
        html_faculty += '</div>';
        html_faculty += '</div>';
        html_faculty += '</div>';
        html_faculty += '</div>';
        $('.list-faculty').append(html_faculty);
    });

    $('#add_fs_info').click(function(){
        fsId = $('#fs_id').val();
        if(fsId == 0){ return false; }

        $('#loading-fixed').show();
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '/admin/add-fs-info',
            type: 'POST',
            data: {'fsId': fsId},
            success: function (data) {
                $('#fs_id option[value='+ fsId +']').attr('disabled','disabled');
                $('#fs_id').trigger("chosen:updated");
                $('#loading-fixed').hide();
            }
        });
    });

});
function addMoreSchool(elem){
    stt = $(elem).parents().eq(2).before().find('.list-school').attr('stt');
    $(elem).parents().eq(2).before().find('.list-school').find(".child-school" ).each(function( index ) {
        $(this).find('.name_school').attr('name', 'structure['+ stt +'][school]['+ (index + 1) +'][name_school]');
        $(this).find('.s_child').attr('name', 'structure['+ stt +'][school]['+ (index + 1) +'][child]');
    });
    count = $(elem).parents().eq(2).before().find('.list-school').find('.child-school').length + 1;
    html_school = '<div class="child-school">';
    html_school += '<div class="col-sm-1"><a class="btn btn-white" onclick="removeElem(this);"><i class="fa fa-minus"></i></a></div>';
    html_school += '<div class="col-sm-7">';
    html_school += '<input type="text" name="structure['+ stt +'][school]['+ count +'][name_school]" class="form-control name_school">';
    html_school += '</div>';
    html_school += '<div class="col-sm-4">';
    html_school += '<select class="form-control m-b s_child" name="structure['+ stt +'][school]['+ count +'][child]">';
    html_school += '<option value="undergraduate">Undergraduate</option>';
    html_school += '<option value="graduate">Graduate</option>';
    html_school += '</select>';
    html_school += '</div></div>';
    $(elem).parents().eq(2).before().find('.list-school').append(html_school);
}
function removeElem(elem){
    fs_id = $(elem).attr('fs_id');
    if(fs_id){
        fs_ids = $('#fs_id_remove').val();
        $('#fs_id_remove').val(fs_ids + '|' + fs_id);
    }

    f_id = $(elem).attr('f_id');
    if(f_id){
        f_ids = $('#f_id_remove').val();
        $('#f_id_remove').val(f_ids + '|' + f_id);
    }
    elem = $(elem).parents().eq(1);
    elem.remove();
}