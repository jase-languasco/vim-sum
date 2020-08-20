require('./bootstrap');

if (window.opener) {
    const open = window.opener
    open.location = 'https://local.tave.com/app/scheduling/edit';
    console.log(open)
}