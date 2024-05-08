let myNeme = "مرحبا بكم في موقع انذار للمراقبة"
    ;
let index = 1;

function witeText() {

    document.querySelector("h1").textContent = myNeme.slice(0, index)

    index++

    if (index > myNeme.length) {
        index = 1;
    }

}
setInterval(function () {
    witeText();
}, 200);


//.select.Landig.page.Element
let landing = document.querySelector(".landing");


// Get Array of imgs
let imgsArray = ["01.jpg", "02.jpg", "06.jpg",];


setInterval(() => {

    // Get Random Nember
    let randomNeumber = Math.floor(Math.random() * imgsArray.length);

    // Chane Background imgs Ur1 
    landing.style.backgroundImage = 'url("imgs/' + imgsArray[randomNeumber] + '")';

}, 6000);





