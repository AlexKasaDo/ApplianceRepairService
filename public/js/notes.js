$(document).ready(function () {
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
            success: function (newNote) {
                $('#noteAdd').addClass('d-none');
                $('#noteAdd > textarea').val('');
                $('#note-list').append('<li class="list-group-item">\n' +
                    '                            <div class="row">\n' +
                    '                                <div class="text-left col-9">\n' +
                    '                                    <p><small>' + newNote["created_at"] + '</small><b>' + newNote["userName"] + '</b>\n' +
                    '                                        </p>\n' +
                    '                                    <p>' + newNote["text"] + '</p>\n' +
                    '                                </div>\n' +
                    '                                <div class="text-right col-3">\n' +
                    '                                    <button class="btn update-note"  type="button">\n' +
                    '                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"\n' +
                    '                                             viewBox="0 0 24 24">\n' +
                    '                                            <path\n' +
                    '                                                d="M4.765 20.467l-1.328 2.443s-1.649.425-2.682 1.09l-.258-.257 1.237-1.237c.108-.109.249-.178.401-.196.084-.011.166-.048.23-.113.155-.155.155-.407 0-.562s-.407-.155-.562 0c-.065.065-.103.146-.113.23-.019.152-.088.293-.196.402l-1.237 1.237-.257-.258c.672-1.044 1.09-2.682 1.09-2.682l2.443-1.329 1.232 1.232zm18.923-18.3c.209-.246.312-.549.312-.851 0-.726-.589-1.316-1.316-1.316-.302 0-.604.103-.851.312 0 0-12.252 9.474-14.236 11.458-1.383 1.383-1.677 2.673-3.49 6.327l1.795 1.796c3.425-1.699 4.857-2.021 6.327-3.49 1.982-1.979 11.459-14.236 11.459-14.236z"/>\n' +
                    '                                        </svg>\n' +
                    '                                    </button>\n' +
                    '                                    <button class="btn delete-note" data-id="' + newNote["id"] + '" data-url="' + newNote["url"] + '" onclick="del()" type="button">\n' +
                    '                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"\n' +
                    '                                             width="14" height="14"\n' +
                    '                                             viewBox="0 0 24 24"\n' +
                    '                                             style=" fill:#000000;">\n' +
                    '                                            <path\n' +
                    '                                                d="M 10 2 L 9 3 L 3 3 L 3 5 L 21 5 L 21 3 L 15 3 L 14 2 L 10 2 z M 4.3652344 7 L 5.8925781 20.263672 C 6.0245781 21.253672 6.877 22 7.875 22 L 16.123047 22 C 17.121047 22 17.974422 21.254859 18.107422 20.255859 L 19.634766 7 L 4.3652344 7 z"></path>\n' +
                    '                                        </svg>\n' +
                    '                                    </button>\n' +
                    '\n' +
                    '                                </div>\n' +
                    '                            </div>\n' +
                    '                        </li>');

            }
        });
    });


});

function del() {
    $('li').on('click', 'button.delete-note', function () {
        let thisData = $(this);
        $.ajax({
            url: thisData.data('url'),
            type: 'delete',
            data: {'_token': $('meta[name="csrf-token"]').attr('content')},
            success: function () {
                thisData.parent().parent().parent().remove();
            }
        });
    });
}
