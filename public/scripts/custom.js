//reference my own dissertation with all this jam

function closeDiv(event, type="DIV") {

    let parentElement, clickedElement = event.target;
    parentElement = clickedElement.parentNode;

    while(parentElement.tagName !== type) {
        parentElement = parentElement.parentNode;
    }

    parentElement.remove();
}


window.onscroll = function() {
    scrollCheck();
};

function scrollCheck() {
    let button = document.querySelector(".top-button");
    if (window.scrollY > 500) {
        button.style.display = "block";
    }
    else {
        button.style.display = "none";
    }
}


function scrollUpTop() {

    //i.e. desktop modes

    let logo = document.querySelector(".logo");

    if(window.innerWidth > 1000 || logo == null) {
        //scrollTop is for safari other is for ie chrome etc
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
    if(logo!=null) {
        //when smaller screens therefore in mobile format scroll to top of page (logo)

        logo.scrollIntoView({behavior: 'smooth'});

    }


}
