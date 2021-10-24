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
});
// $(function () {
//     $(`#department`).on('beforeSubmit', function (e) {
//         const formVal = document.getElementById('department');
//         console.log("form: ",formVal);
//         alert(formVal)
//         return false;
//     })
// });



/**
 * 
 * @param {*} formArray 
 * @returns  formJson
 * the function accept a form array and return the json object of the form. you should have applied serializeArray() method on your form then assign the form array to this function.
 */
function getFormAsJson(formArray) {
     
   let formJson = {};
formArray.map(function(item, index) {
    console.log('index: ',index);
    if(index !=0){
        if ( formJson[item.name] ) {
        if ( typeof(formJson[item.name]) === "string" ) {
            
            formJson[item.name] = [formJson[item.name]];
        }
        formJson[item.name].push(item.value);
    } else {
        let key = item.name.split('[')[1];

        if(key){
            key = key.split('');
            key = key.splice(0, key.length -1)
            key = key.join('');
        }
            console.log("Key: ",key);
        formJson[key] = item.value;
    }
    }
});
    return formJson;
}
 
