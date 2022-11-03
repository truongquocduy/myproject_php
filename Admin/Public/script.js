var myMenu = false;
function menuStatus(){
    let musw = document.getElementById('myMenu')
    let menuBox = document.getElementById('menu-content')
    let contentBox = document.getElementById('body-content')
    let navBox = document.getElementsByClassName('nav')[0]
    if(myMenu==false){
        menuBox.style.width='5.5%'
        contentBox.style.width='94.5%'
        navBox.style.width='94.5%'
        myMenu=true;
    }
    else{
        menuBox.style.width='19%'
        contentBox.style.width='81%'
        navBox.style.width='81%'

        myMenu=false;
    }

}
function randomID(){
    var mssv = document.getElementById('mssv');
    let x = Math.floor((Math.random() * 99) + 0);
    mssv.value= '5012005' + x;
}