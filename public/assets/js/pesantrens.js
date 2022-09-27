const typePesantren = document.getElementById('type-pesantren');
const boxPa = document.getElementById('box-pa');
const boxPi = document.getElementById('box-pi');
const qtySantriPa = document.getElementById('qty-pa');
const qtySantriPi = document.getElementById('qty-pi');

const choseType = () =>{
    if (typePesantren) {
        if (typePesantren.value == 'pa_pi') {
            boxPa.style.display ='block';
            boxPi.style.display ='block';
            qtySantriPa.required =true;
            qtySantriPi.required =true;
        }else if(typePesantren.value == 'pa'){
            boxPa.style.display ='block';
            boxPi.style.display ='none';
            qtySantriPa.required =true;
            qtySantriPi.required =false;
        }else if(typePesantren.value == 'pi'){
            boxPi.style.display ='block';
            boxPa.style.display ='none';
            qtySantriPi.required =true;
            qtySantriPa.required =false;
        }
    }
}

const previewImage = ()=>{
    const file = document.querySelector('#image');
    const filePreview = document.querySelector('.file-preview');
    filePreview.style.display = 'block';
    const oFReader = new FileReader();
    oFReader.readAsDataURL(file.files[0]);
    oFReader.onload = function(oFREvent) {
        filePreview.src = oFREvent.target.result;
    }
}

window.onload = choseType();
