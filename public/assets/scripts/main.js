let openMenu = document.querySelector('.menu')
let menu = document.querySelector('nav')
let closeMenu = document.getElementById('close')

openMenu.addEventListener('click', open)
closeMenu.addEventListener('click', close)

function open(){
    menu.style.display = 'flex'
    menu.style.top = '0'
}

function close(){
    menu.style.top = '-100%'
}