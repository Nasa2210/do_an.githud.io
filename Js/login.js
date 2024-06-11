const links_signup = document.querySelector('.links_signup');
const links_signin= document.querySelector('.links_signin');
const wappers=document.querySelector('.wapper');
links_signup.addEventListener('click', () => {
    // sign_in.classList.remove('active');
    wappers.classList.add('active');
});
links_signin.addEventListener('click', () => {
    wappers.classList.remove('active');
});

