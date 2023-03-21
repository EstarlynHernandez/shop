function ready(){
    if(document.readyState == 'complete'){
        main();
    }else{
        setTimeout(ready, 100);
    }
}
ready();

function main(){
    let menu = document.querySelector('.mobileMenu');
    let menuIcon = document.querySelector('.iconMenu');
    let shadow = document.querySelector('.shadow');

    menuIcon.addEventListener('click', () => {
        menu.classList.toggle('dnone');
        shadow.classList.toggle('dnone');
    })
    
    shadow.addEventListener('click', () => {
        menu.classList.toggle('dnone');
        shadow.classList.toggle('dnone');
    })

}