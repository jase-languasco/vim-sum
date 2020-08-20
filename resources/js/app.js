require('./bootstrap');

if (window.opener) {
    const sesame = window.opener
    sesame.location = 'https://local.tave.com/app/scheduling/edit';
    console.log(sesame)
}