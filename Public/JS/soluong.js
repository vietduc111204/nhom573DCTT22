function validateQuantity(input) {
    if (input.value < 0) {
        input.setCustomValidity('Số lượng không được âm');
    } else {
        input.setCustomValidity('');
    }
}