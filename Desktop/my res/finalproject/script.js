
// ---------------NAV BAR--------------


const toggleButton = document.getElementsByClassName('toggle-button')[0]
const navbarLinks = document.getElementsByClassName('navbar-links')[0]
toggleButton.addEventListener('click', ()=>{
    navbarLinks.classList.toggle('active');
    toggleButton.classList.toggle('activeBtn')
})


// ---------------SHOW EVERYTHING FROM LEFT--------------
const showElement = document.querySelectorAll(".LeftShow")

const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        entry.target.classList.toggle("showElementsLeft", entry.isIntersecting)
        if (entry.isIntersecting) observer.unobserve(entry.target)
    })
},{
    threshold: 0.2,
})

showElement.forEach(showElement => {
    observer.observe(showElement)
})




// ---------DISPLAYING SEARCH BAR-----------
const searchImg = document.querySelectorAll('.search-img')[0];
const homeOverlaySearch = document.querySelectorAll('.home-overlay-search')[0];


searchImg.addEventListener('click', function(){
    homeOverlaySearch.classList.toggle('homeOverlaySearchOpen')
});

// SLIDING IMAGES
var slatdeImg = document.getElementById('slatdeImg');
var images = new Array(
    "images/bg.jpg",
    "images/bg12.jpg",
    "images/bg3.jpg",
    "images/bg5.jpg"
);
var len = images.length;
var i = 0;

function slider(){
    if(i > len-1){
        i = 0;
    }
    slatdeImg.src = images[i];
    i++;
    setTimeout('slider()',4000);
}

// ---------LOADER-----------

// function loader(){
//     document.querySelector('.loader-container').classList.add('loading-page');
// }

// function fadeOut(){
//     setInterval(loader ,400);
// }

// window.onload = fadeOut;





