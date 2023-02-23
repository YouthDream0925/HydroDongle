var css = null;

const toast = (status, message) => {
    css = status;
    let x = $('#snackbar');
    x.addClass(status + ' show');
    x.html(message);
    setTimeout(remove_toast, 3000);
};

const remove_toast = (status) => {
    let x = $('#snackbar');
    x.removeClass(css + ' show');
};

export default toast;