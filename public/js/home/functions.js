function trash(id) {

    // Todo: make alert to ask deletion
    $('#trash').val(id);
    $('#send-trash').submit();

}

function showFullText(el) {
    swal.fire($(el).attr('full-text'))
}
