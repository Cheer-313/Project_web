// Check input form
function checkInput(options) {

    var selectorRules = {};

    function validate(inputElement, rule) {
        // var errorElement = inputElement.parentElement.querySelector(options.errorSelector);
        var errorElement = inputElement.closest('.form-group').querySelector(options.errorSelector);
        var errorMessage;

        // Lấy các rules của selector
        var rules = selectorRules[rule.selector];

        // Lặp qua từng rule và kiểm tra + Nếu có lỗi thì dừng kiểm tra
        for (var i = 0; i < rules.length; i++) {
            errorMessage = rules[i](inputElement.value);
            if (errorMessage) break;
        }

        if (errorMessage) {
            errorElement.innerText = errorMessage;
            inputElement.closest('.form-group').classList.add('invalid');
        } else {
            errorElement.innerText = '';
            inputElement.closest('.form-group').classList.remove('invalid');
        }

        return errorMessage;
    }

    // Lấy element của form cần check input
    var formElement = document.querySelector(options.form);

    if (formElement) {

        // Xử lý sự kiện onsubmit
        formElement.onsubmit = function(e) {
            e.preventDefault();

            var isFormValid = true;

            // Lặp qua từng rule và validate
            options.rules.forEach(function(rule) {
                var inputElement = formElement.querySelector(rule.selector);
                var isValid = validate(inputElement, rule);     // Không lỗi trả về false
                if (isValid) {
                    isFormValid = false;
                }
            });

            // Khi điền đầy đủ thông tin thì submit
            if (isFormValid) {
                formElement.submit();
            }
        }

        // Lặp qua mỗi rule và xử lý sự kiện (blur, input)
        options.rules.forEach(function(rule) {

            // Lưu lại các rules cho mỗi input
            if (Array.isArray(selectorRules[rule.selector])) {
                selectorRules[rule.selector].push(rule.test);
            } else {
                selectorRules[rule.selector] = [rule.test];
            }

            var inputElement = formElement.querySelector(rule.selector);

            if (inputElement) {
                // Xử lý trường hợp blur
                inputElement.onblur = function() {
                    validate(inputElement, rule);
                }

                // Xử lý trường hợp người dùng nhập vào input
                inputElement.oninput = function() {
                    var errorElement = inputElement.closest('.form-group').querySelector(options.errorSelector);
                    errorElement.innerText = '';
                    inputElement.closest('.form-group').classList.remove('invalid');
                }
            }
        });
        // console.log(selectorRules);
    }
}

checkInput.isRequired = function(selector) {
    return {
        selector: selector,
        test: function(value) {
            return value.trim() ? undefined : 'Please enter this field'
        }
    };
}

checkInput.isEmail = function(selector) {
    return {
        selector: selector,
        test: function(value) {
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regex.test(value) ? undefined : 'This field must be email'
        }
    };
}

checkInput.minLength = function(selector, min) {
    return {
        selector: selector,
        test: function(value) {
            return value.length >= min ? undefined : `Please enter at least ${min} characters`
        }
    };
}

checkInput.isConfirmed = function(selector, getConfirmValue) {
    return {
        selector: selector,
        test: function(value) {
            return value === getConfirmValue() ? undefined : 'Confirm password does not match'
        }
    };
}

checkInput.isDateOfBirth = function(selector) {
    return {
        selector: selector,
        test: function(value) {
            var regex = /^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$/;
            return regex.test(value) ? undefined : 'Invalid date of birth'
        }
    };
}

checkInput.isPhone = function(selector) {
    return {
        selector: selector,
        test: function(value) {
            var regex = /(84|0[3|5|7|8|9])+([0-9]{8})\b/;
            return regex.test(value) ? undefined : 'Invalid phone number'
        }
    };
}

// Gọi hàm checkInput
checkInput({
    form: '#form-1',
    errorSelector: '.form-message',
    rules: [
        checkInput.isRequired('#fullname'),
        checkInput.isRequired('#username'),
        checkInput.isRequired('#email'),
        checkInput.isEmail('#email'),
        checkInput.isPhone('#phone'),
        checkInput.isDateOfBirth('#dateofbirth'),
        checkInput.minLength('#password', 6),
        checkInput.isRequired('#password-confirmation'),
        checkInput.isConfirmed('#password-confirmation', function() {
            return document.querySelector('#form-1 #password').value;
        })
    ]
});

checkInput({
    form: '#form-2',
    errorSelector: '.form-message',
    rules: [
        checkInput.isRequired('#username'),
        checkInput.minLength('#password', 6)
    ]
});

checkInput({
    form: '#form-3',
    errorSelector: '.form-message',
    rules: [
        checkInput.isRequired('#email'),
        checkInput.isEmail('#email')
    ]
});