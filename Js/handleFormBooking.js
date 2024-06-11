var dateCome = document.querySelector('#date_come');
var dateLeave = document.querySelector('#date_leave');
var date = new Date();
var year = date.getFullYear();
var month = String(date.getMonth() +1).padStart(2, '0');
var today = String(date.getDate()).padStart(2, '0');
var dateCurrent = year + '-' + month + '-' + today;
dateCome.min = dateCurrent;
dateLeave.min = dateCurrent;
dateCome.addEventListener('change', function()
{
    console.log(dateCurrent, dateCome.value);
    dateLeave.min = dateCome.value;
})
Validator({
    form: '#booking-form',
    orrorSelector: '.form-message',
    formGroupSelector: '.form_group' ,
    rules: [
    Validator.isRequired('#full_name'),
    Validator.isRequired('#phone'),
    Validator.isRequired('#email'),
    Validator.isEmail('#email'),
    Validator.isRequired('#select_branch'),
//     Validator.isRequired('#select_area'),
     Validator.isRequired('#select_hotel'),
     Validator.isRequired('#select_type-room'),
     Validator.isRequired('#date_come'), 
     Validator.isRequired('#date_leave'),
     Validator.isRequired('#number-room'),
     Validator.isNumber('#number-room'),
    ]
})
// ========================= handle select branch =========================