import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

var writeSpeed = 2;
var deleteSpeed = 3;
var pauseTime = 1000;

var typeList = ["Gaming accessories", "Everyday items", "Your favourite gadgets"];
var startingWord = "Search for ";

function loopTypewriter(elementId, texts, writeSpeed = 50, deleteSpeed = 50, pause = 1000, startingWord = "") {
    const element = document.getElementById(elementId);
    if (!element) return;
    let index = 0;

    function typeWriter(text, i = 0) {
        if (i < text.length) {
            element.placeholder = startingWord + text.substring(0, i + 1);
            setTimeout(() => typeWriter(text, i + 1), 100/writeSpeed);
        } else {
            setTimeout(() => deleteWriter(text.length - 1), pause);
        }
    }

    function deleteWriter(i) {
        if (i >= 0) {
            element.placeholder = startingWord + texts[index].substring(0, i);
            setTimeout(() => deleteWriter(i - 1), 100/deleteSpeed);
        } else {
            index = (index + 1) % texts.length;
            setTimeout(() => typeWriter(texts[index]), 100/writeSpeed);
        }
    }

    element.placeholder = startingWord;
    typeWriter(texts[index]);
}

document.addEventListener("DOMContentLoaded", () => {
    loopTypewriter("typewriter", typeList, writeSpeed, deleteSpeed, pauseTime, startingWord);
});
