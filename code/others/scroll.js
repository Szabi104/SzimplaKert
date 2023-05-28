document.addEventListener('DOMContentLoaded', function () {
    const queryString = window.location.search;
    console.log(queryString);
    if(queryString == "?q=scroll") window.scrollTo(0,10000);
}, false);