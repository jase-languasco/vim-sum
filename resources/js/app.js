require('./bootstrap');

if (window.opener) {
    window.opener.location = 'https://local.tave.com/app/scheduling/edit';
}