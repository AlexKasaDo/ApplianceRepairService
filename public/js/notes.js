$(document).ready( function(){
    $('#buttonNoteAdd').on('click', function () {
        $('#noteAdd').removeClass('d-none');
    });
    $('#cancelNote').on('click', function () {
        $('#noteAdd').addClass('d-none');
    });
    $('#saveNote').on('click', function () {

        $.ajax({
            type: 'POST',
            url: $('#noteAdd').attr('action'),
            data: $('#noteAdd').serializeArray(),
            success: function () {
                $('#noteAdd').addClass('d-none');

            }
        });
    });

    $('.delete-note').on('click',function () {
        let thisData = $(this);
        $.ajax({
            url: thisData.data('url'),
            type: 'delete',
            data:{'_token': $('meta[name="csrf-token"]').attr('content')},
            success: function () {
                thisData.parent().parent().remove();
            }
        });
    })
});
