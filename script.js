"use strict";
const inputgrup = document.querySelector('.comment__group');
const _name = document.querySelector('#name');
const phone = document.querySelector('#phone');
const mail = document.querySelector('#mail');
const comment = document.querySelector('.comment');
const insertdiv = document.querySelector('.content');
const char = document.querySelector('.char');

const date = new Date();

document.querySelector('.yorumbuton').addEventListener('click', function () {

    !inputgrup.classList.toggle('disabled') ? inputgrup.classList.remove('disabled') : inputgrup.classList.add('disabled');

})

comment.addEventListener('input', function () {

    if (comment.value.length <= 150) {
        char.innerHTML = 150 - comment.value.length;

        comment.style.border = '1px solid green';


    } else {

        comment.style.border = '1px solid red';
    }


})

document.querySelector('.gonder').addEventListener('click', function (e) {

    if (comment.value != '' && _name.value != '') {

        if (comment.value.length <= 150) {
            // displaycomments(comments.at(-1));
            !inputgrup.classList.toggle('disabled') ? inputgrup.classList.remove('disabled') : inputgrup.classList.add('disabled');


        } else {
            alert('Lütfen 150 Karakteri Geçmeyiniz');

        }




    } else {

        alert('Yorum ve İsim Kısmı boş olamaz!')

    }







});

let phonecontrol = document.querySelectorAll('.phone');

phonecontrol.forEach(element => {

    if (element.textContent != '') {
        element.style.display = 'undefined';
    } else {
        element.style.display = 'none';
    }

});

let allname = document.querySelectorAll('.allname');

allname.forEach(e => {

    e.textContent = controlempty(e.textContent.split(" "));


});


function controlempty(dizi) {
    let yenidizi = [];
    dizi.forEach(e => {
        if (e == '') {
            e.split();
        } else {
            yenidizi.push(e);
        };
    })
    return yenidizi.map(kelime => kelime[0].toUpperCase() + kelime.slice(1, kelime.length + 1)).join(" ");

}

function isNumeric(value) {
    return /^\d+$/.test(value);
}


// function maindisplay() {

//     comments.forEach(e => {
//         let html = `
//         <div class="content__comment clearfix">
//         <div class="content__comment--img">
//             <span class="content__comment--img--name">${e.name[0]}</span>
//         </div>
//         <div class="content__comment--comment ">
//             <p>${e.comment}
//             </p>
//         </div>

//         <div class="content__comment--name clearfix">
//         <span>${e.name.toUpperCase()}</span>
//             <span>${e.phone}</span>
//             <span>${e.date}</span>
//         </div>
//     </div>
//         `;

//         insertdiv.insertAdjacentHTML('beforeend', html);
//     })
// }
// function displaycomments(liste) {
//     let control;
//     if (liste.phone != '') {
//     } else {
//         control = false
//     }

//     let html = `
//         <div class="content__comment clearfix">
//          <div class="content__comment--img">
//              <span class="content__comment--img--name">${liste.name[0]}</span>
//          </div>
//          <div class="content__comment--comment ">
//              <p>${liste.comment}
//              </p>
//          </div>

//          <div class="content__comment--name ">
//              <span>${liste.name.toUpperCase()}</span>
//              <span class='${control ? '' : 'disabled'}' >${liste.phone}</span>
//              <span>${liste.date}</span>
//          </div>
//      </div>
//          `;

//     insertdiv.insertAdjacentHTML('beforeend', html);

// }

// maindisplay();