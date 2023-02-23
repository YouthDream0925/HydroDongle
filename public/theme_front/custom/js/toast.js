const toast = (message) => {
    let x = $('#snackbar');
    x.addClass('show');
    x.html(message);
    setTimeout(remove_toast, 3000);
};

const remove_toast = () => {
    let x = $('#snackbar');
    x.removeClass('show');
};

export default toast;