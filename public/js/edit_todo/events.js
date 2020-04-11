$(document).ready(function () {

    $('#submit').click(function () {

        const $this = $(this);
        const haveToSend = $('#notification').is(":checked");

        $(`<input type="text" name="notification" hidden>`)
            .insertBefore($this)
            .val(haveToSend);

    });
});
