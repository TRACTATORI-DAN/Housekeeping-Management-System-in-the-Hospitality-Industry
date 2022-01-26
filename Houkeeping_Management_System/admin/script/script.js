function time()
{
    var currentTime = new Date();
    var hours = currentTime.getHours();
    var nowDate = new Date(); 
    var date = nowDate.getDate()+'-'+(nowDate.getMonth()+1)+'-'+nowDate.getFullYear();
    var minutes = currentTime.getMinutes();
    var suffix = "AM";
    if (hours >= 12) {
        suffix = "PM";
        hours = hours - 12;
    }
    if (hours == 0) {
        hours = 12;
    }
    if (minutes < 10) {
        minutes = "0" + minutes;
    }
    return document.write("<b>" + hours + ":" + minutes + " " + suffix +" "+date + "</b>");

}

