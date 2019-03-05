$(document).ready(function(){
    var i = 0;
    var r = 0;
    var g = 0;
    var b = 0;
    setInterval(function(){
        i+=3;
        r +=1 
        g +=3
        b +=5
        i = (i == 350)?0:i
        r = (r >= 250)?0:r
        g = (g >= 250)?0:g
        b = (b >= 250)?0:b
        $('.quadrado-rodadndo').css({
            transform: 'rotate('+i+'deg)',
            backgroundColor:'rgb('+r+','+g+','+b+')'
        })
        
    },20);

})