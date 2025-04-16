function validatePrice(input) {
    if (input.value < 0) {
        input.setCustomValidity('Đơn giá không được âm');
    } else {
        input.setCustomValidity('');
    }
}