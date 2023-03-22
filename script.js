const toggleButton = document.getElementsByClassName('toggle-button')[0]
const navbarLinks = document.getElementsByClassName('navbar-links')[0]
toggleButton.addEventListener('click', ()=>{
    navbarLinks.classList.toggle('active')
})





// THIS CODE IS FOR SERVICES CARDS SECTION
 
const cards = document.querySelectorAll(".card")

const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        entry.target.classList.toggle("showCard", entry.isIntersecting)
        // if (entry.isIntersecting) observer.unobserve(entry.target)
    })
},
{
    threshold: 0.1,
})

cards.forEach(card => {
    observer.observe(card)
})


// THIS CODE IS SHOWING ELEMENTS FROM right FOR ABOUT TEXT & CONTACT ADDRESS



const aboutText = document.querySelectorAll(".text")

const observerA = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        entry.target.classList.toggle("showElementFromRight", entry.isIntersecting)
        // if (entry.isIntersecting) observer.unobserve(entry.target)
    })
},{
    threshold: 0.2,
})

aboutText.forEach(aboutText => {
    observerA.observe(aboutText)
})


const aboutImgForm = document.querySelectorAll(".about-imgs")

const observerI = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        entry.target.classList.toggle("showElementFromLeft", entry.isIntersecting)
        if (entry.isIntersecting) observer.unobserve(entry.target)
    })
},{
    threshold: 0.2,
})

aboutImgForm.forEach(aboutImgForm => {
    observerI.observe(aboutImgForm)
})


// ---------DISPLAYING SEARCH BAR
const searchIcon = document.querySelectorAll('.searci-icon')[0];
const searchOverlay = document.querySelectorAll('.search-overlay')[0];

searchIcon.addEventListener('click',function(){
    searchOverlay.classList.toggle('search-input-active')
})
