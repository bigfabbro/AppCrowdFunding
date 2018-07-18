function Next(id){
    var num=parseInt(id[1])
    var thisid="c"+num.toString()
    var nextid="c"+(num+1).toString()
    document.getElementById(thisid).style.visibility = "hidden"
    document.getElementById(nextid).style.visibility = "visible"
}

function Back(id){
    var num=parseInt(id[1])
    var thisid="c"+num.toString()
    var precid="c"+(num-1).toString()
    document.getElementById(thisid).style.visibility = "hidden"
    document.getElementById(precid).style.visibility = "visible"
}