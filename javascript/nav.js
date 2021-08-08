window.onload = () => { 
const buttonMenu = document.querySelector('.menu-button')
const buttonClose = document.querySelector('.close')
const searchClose = document.querySelector('.close-search')
const buttonSearch = document.querySelector('.button-search')
const logo = document.querySelector('.logo')
let test = false

buttonMenu.addEventListener('click', () => {
    menuFunct('.link', "0px")
})
buttonSearch.addEventListener('click', () => {
        menuFunct('.search', '199.1%')
})
searchClose.addEventListener('click', () => {
    menuFunct('.search', "400%")
})
buttonClose.addEventListener('click', () => {
    menuFunct('.link', "-200%")
})
const menuFunct = (element, px ) => {
    let nav = document.querySelector(`${element}`)
    console.log(nav)
    if(test == false) {
            logo.style.display = "none"
            nav.style.transform= `translateX(${px})`
            test = true
    } else { 
        nav.style.transform= `translateX(${px})`
            logo.style.display = "block"
             test = false
    } 
  }
}