slide = document.getElementById("slide")

$('.slide').carousel({interval: 5000});

vid = [document.getElementById("vid1"), document.getElementById("vid2"), document.getElementById("vid3")
, document.getElementById("vid4"), document.getElementById("vid5"), document.getElementById("vid6")
, document.getElementById("vid7"), document.getElementById("vid8"), document.getElementById("vid9")
, document.getElementById("vid10"), document.getElementById("vid11"), document.getElementById("vid12")
, document.getElementById("vid13"), document.getElementById("vid14"), document.getElementById("vid15")
, document.getElementById("vid16")]

for($i = 0; $i <= 16; $i++)
{

vid[$i].volume = 0
vid[$i].addEventListener("mouseover", function(){this.volume = 0.6})
vid[$i].addEventListener("mouseleave", function(){this.volume = 0})

}