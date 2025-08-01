import './bootstrap';
import Alpine from 'alpinejs';

import TypeWriter from './typewriter.js';
import Modal from './modal.js';

window.Alpine = Alpine;

let modal;

Alpine.start();

document.addEventListener("DOMContentLoaded", () => {
    modal = new Modal();

    var path = window.location.pathname;
    switch(path){
        case "/":
            HomePage();
            break;
        case "/products":
            // ProductsPage();
            break;
    }

    DescriptionTruncation();
    MoreLess();
});

function DescriptionTruncation() {
    document.querySelectorAll('.shorten')?.forEach(desc => {
        var characterLimit = parseInt(desc.getAttribute('data-limit')) || 100;
        var p = desc.childNodes[0];
        if (!p || p.nodeType !== Node.TEXT_NODE) {
            console.warn('No text node found in product description:', desc);
            return;
        }

        var words = p.textContent.split(' ');

        if (p.textContent.length > characterLimit) {
            while (p.textContent.length > characterLimit && words.length > 1) {
                words.pop(); // Remove the last word
                p.textContent = words.join(' ') + '...'; // Add ellipsis
            }
            p.textContent = p.textContent.trim()
        }
    })
}

function MoreLess() {
    const categoryFilters = document.querySelectorAll('.filter-category');
    const moreFiltersButton = document.getElementById('more-filters-btn');
    const lessFiltersButton = document.getElementById('less-filters-btn');

    if (!categoryFilters || categoryFilters.length === 0) {
        console.warn('No category filters found on the page.');
        return;
    }
    if (!moreFiltersButton || !lessFiltersButton) {
        console.warn('More/Less filters buttons not found on the page.');
        return;
    }

    const firstShownAmount = 3;
    const incrementAmount = 6;

    let shownFilters = firstShownAmount;
    let totalFilters = categoryFilters.length;

    function updateFilterVisibility() {
        shownFilters= Math.max(firstShownAmount, Math.min(shownFilters, totalFilters));

        categoryFilters.forEach((filter, index) => {
            if (index < shownFilters) {
                filter.style.display = 'block';
            } else {
                if(!filter.childNodes[1].checked)
                    filter.style.display = 'none';
            }
        });

        moreFiltersButton.style.display = (shownFilters < totalFilters) ? 'block' : 'none';
        lessFiltersButton.style.display = (shownFilters > firstShownAmount) ? 'block' : 'none';
    }
    updateFilterVisibility();

    moreFiltersButton.addEventListener('click', () => {
        shownFilters += incrementAmount;
        updateFilterVisibility();
    });

    lessFiltersButton.addEventListener('click', () => {
        shownFilters -= incrementAmount;
        updateFilterVisibility();
    });

    document.querySelectorAll('.filter-category').forEach(filter => {
        filter.addEventListener('click', () => {
            const checkbox = filter.querySelector('input[type="checkbox"]');
            if (checkbox) {
                checkbox.checked = !checkbox.checked;
            }
        });
    });
}

function ProductsPage() {}

function HomePage(){
    document.getElementById('LearnMoreBtn')?.addEventListener('click', () => {
        modal.open({
            title: 'Learn More about HoneyHive',
            content: "<video width='100%' height='auto' autoplay controls><source src='/videos/LearnMore.mp4' type='video/mp4'>Your browser does not support the video tag.</video>"
        });
    });

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