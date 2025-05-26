import './bootstrap';
import Alpine from 'alpinejs';

import TypeWriter from './typewriter.js';
import Modal from './modal.js';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", () => {
    const modal = new Modal();

    switch (window.location.pathname) {
        case '/':
            HomePage();
            break;
        case '/products':
            ProductsPage();
            break;
        default:
            console.warn('No specific page setup found for:', window.location.pathname);
    }

});

function ProductsPage() {
    const characterLimit = 70;

    document.querySelectorAll('.product-description').forEach(desc => {
        var p = desc.childNodes[0];
        if (!p || p.nodeType !== Node.TEXT_NODE) {
            console.warn('No text node found in product description:', desc);
            return;
        }

        var words = p.textContent.split(' ');

        if (p.textContent.length > characterLimit) {
            while (p.textContent.length > characterLimit && words.length > 1) {
                words.pop();
                p.textContent = words.join(' ') + '...';
            }
            p.textContent = p.textContent.trim()
        }
    })
}

function HomePage(){
    try{
        document.getElementById('LearnMoreBtn').addEventListener('click', () => {
            modal.open({
                title: 'Learn More about HoneyHive',
                content: "<video width='100%' height='auto' autoplay controls><source src='/videos/LearnMore.mp4' type='video/mp4'>Your browser does not support the video tag.</video>"
            });
        });
    } catch (e) {}

    try{
        new TypeWriter("typewriter", {
            writeSpeed: 2,
            deleteSpeed: 3,
            pause: 1000,
            typeList: ["Gaming accessories", "Everyday items", "Your favourite gadgets"],
            startingWord: "Search for "
        });
    } catch (e) {}
}