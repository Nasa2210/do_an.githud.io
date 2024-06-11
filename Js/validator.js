function Validator(options) {
    console.log(111);
    var  selectorRules = {};
    function getParentElement(element, selector) {
        while(element.parentElement)
        {
            if(element.parentElement.matches(selector)){
                return element.parentElement;
            }
            element = element.parentElement;
        }
    }
    function validator(inputElement, rule){
        
        var errorMessage ;
        //var errorElement = inputElement.parentElement.querySelector(options.orrorSelector);
        var errorElement = getParentElement(inputElement, options.formGroupSelector).querySelector(options.orrorSelector);
        // lấy ra các rules của selector
        var rules = selectorRules[rule.selector]
        // lập qua từng rule và kt nếu có lỗi thì dừng
        for(var i = 0; i < rules.length; i++){
            switch(inputElement.type){
                case 'radio':
                case 'checkbox':
                    errorMessage = rules[i](formElement.querySelector(rule.selector+ ":checked")
                    ); 
                    break;
                default:
                    errorMessage = rules[i](inputElement.value)
            }
            
            if(errorMessage)
                break;
        }
        if(errorMessage)
        {
            errorElement.innerText = errorMessage;
            getParentElement(inputElement, options.formGroupSelector).classList.add("invalid");
        }else{
            handelRemoveStatusMessage(inputElement,errorElement)
        }
        return !errorMessage
    }

    function handelRemoveStatusMessage(inputElement,errorElement){
        errorElement.innerText = ''
        getParentElement(inputElement, options.formGroupSelector).classList.remove("invalid");
    }

    var formElement = document.querySelector(options.form) 

    if(formElement)
    {
        // loại bỏ  khi submit form 
        formElement.onsubmit = function(e){
            e.preventDefault();

            var isFormValid = true;
        // thực hiện lặp qua từng rule và validator
        options.rules.forEach( (rule) => {
            var inputElement = formElement.querySelector(rule.selector);
            var isValid = validator(inputElement, rule);  
            if(! isValid)
                isFormValid = false;
        })
            if(isFormValid){ // trường hợp submit vs js 
                if(typeof options.onSubmit == 'function'){
                    var enableInput = formElement.querySelectorAll('[name]');
                    var formValues = Array.from(enableInput).reduce(function(values, input){
                        switch(input.type){
                            case 'radio':
                                values[input.name] = formElement.querySelector('input[name="' + input.name + '"]:checked').value;
                                break;
                            case 'checkbox':
                                if(!input.matches(':checked')) return values; 
                                if(!Array.isArray(values[input.name])){
                                    values[input.name] = [];
                                }
                                values[input.name].push(input.value)                                
                                break;
                            case 'file':
                                values[input.name] = input.files;
                                break;
                            default:
                                values[input.name] = input.value;
                        }
                        return values;
                    }, {}) 

                    options.onSubmit(formValues)
                }
                else // hành vi mặc định của JS
                {
                    formElement.submit();
                }
            }
        }
        // xử lý lập qua mỗi rule và xửa lý
        options.rules.forEach( (rule) => {
            // lưu lại các rule cho mỗi input
            if(Array.isArray(selectorRules[rule.selector]))
            {
                selectorRules[rule.selector].push(rule.test)
            }
            else{
                selectorRules[rule.selector] = [rule.test]
            }

            var inputElements = formElement.querySelectorAll(rule.selector);
            Array.from(inputElements).forEach( (inputElement) =>{
                if(inputElement) {
                // xửa lý trường hợp bur ra ngoài
                inputElement.onblur = function(){
                   validator(inputElement, rule)
                }
                // xữ lý người dùng nhập vào input 
                inputElement.oninput = function(){
                    handelRemoveStatusMessage(inputElement,getParentElement(inputElement, options.formGroupSelector).querySelector(".form-message"))
                }
            }
            });
        });
    }
}   

// định nghĩa rule 
// nguyên tắc rules
// 1. khi có lỗi trả ra lổi 2. ko có lổi return undefine

Validator.isRequired = function (selector, message){
    return {
        selector: selector,
        test: function (value){
            return value ? undefined : message|| 'Vui lòng nhập trường này';
        }
    }
}
Validator.isEmail = function (selector, message){
    return {
        selector: selector,
        test: function (value){
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regex.test(value) ? undefined : message || 'Trường này phải là Email';
        }
    }
}
Validator.isNumber = function (selector, message){
    return {
        selector: selector,
        test: function (value){
            return parseInt(value) ? undefined : message || 'Trường này phải là số';
        }
    }
}
Validator.minLength = function (selector, min, message){
    return {
        selector: selector,
        test: function (value){
            return value.length>= min ? message || undefined : `Vui lòng nhập tối thiểu ${min} kí tự`;
        }
    }
}
Validator.isConfirmed = function (selector, getConfirmValue, message){
    return {
        selector: selector,
        test: function (value){
            return value === getConfirmValue() ? undefined : message || 'Mật khẩu không trùng khớp';
        }
    }
}   