export default class Modal {
    constructor() {
        this.modal = document.getElementById('modal-overlay');
        this.title = document.getElementById('modal-title');
        this.content = document.getElementById('modal-content');
        this.closeBtn = document.getElementById('modal-button');

        if (!this.modal || !this.title || !this.content || !this.closeBtn) {
            console.error('Modal elements are missing in the DOM.');
            return;
        }

        // Attach close event to the close button
        this.closeBtn.onclick = () => this.close();

        // Attach close event to the modal overlay
        this.modal.onclick = (e) => {
            if (e.target === this.modal) {
                this.close();
            }
        };
    }

    open(options = {}) {
        if (options.title) {
            this.title.textContent = options.title;
        }

        this.content.innerHTML = options.content || 'No content here :(';

        this.modal.style.display = 'flex';
    }

    close() {
        this.stopVideos();
        this.title.innerHTML = '';
        this.content.innerHTML = '';
        this.modal.style.display = 'none';
    }

    stopVideos() {
        const videos = document.querySelectorAll('video');
        videos.forEach(video => {
            video.pause();
            video.currentTime = 0;
        });
    }
}