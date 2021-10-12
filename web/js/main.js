$(function () {
    $('#modalButton').click(function () {
        $('#modal').modal('show').find('#modalContent').load($(this).attr('value'));
        // console.log('Form: ', this);
    });
});

$(function () {
    const button = $('#submit-department-form');
    button.click(function () {
        const form = $('department-form')
        console.log("Button clicked", form);
    })
})

 