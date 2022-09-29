let i = 0;
let txt = 'Hai! Selamat Datang Di Infotren';
const speed = 50;

function typeWriter() {
  if (i < txt.length) {
    document.getElementById("typing-text").innerHTML += txt.charAt(i);
    i++;
    setTimeout(typeWriter, speed);
  }
}

typeWriter();



