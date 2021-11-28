var tabButton = document.querySelectorAll('.tab .tab-head button') ;
var tabPanel = document.querySelectorAll('.tab .tab-content');
var apply = document.getElementById('apply');
var rootElement = document.documentElement ;



function showPanel(index){

tabButton.forEach(function(node){
    node.style.backgroundColor="";
    node.style.color="";
});
tabButton[index].style.color="black";
tabButton[index].style.backgroundColor="white";

tabPanel.forEach(function(node){
    node.style.display="none";
});
tabPanel[index].style.backgroundColor="white";
tabPanel[index].style.display="block";
tabPanel[index].style.color="black";

}
showPanel(1); 
// default


// adding scroll up feature
function scrollToTop(){
    rootElement.scrollTo({
        top:0,
        behavior:"smooth"
    })

}
apply.addEventListener('click',function(){
    showPanel(1);
    scrollToTop();
} );


// exp || edu
var exp = document.getElementsByClassName('exp');
var edu = document.getElementsByClassName('edu');
var form1 = document.getElementsByClassName('form1');


console.log('experience ');
console.log(edu);

function showtab(){
console.log('done');
}

edu.addEventListener('click',function(){
showtab();
});
