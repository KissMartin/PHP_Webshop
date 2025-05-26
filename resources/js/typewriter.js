/**
 * @typedef {Object} TypeWriterMetadata
 * @property {int} writeSpeed
 * @property {int} deleteSpeed
 * @property {int} pause
 * @property {string[]} typeList
 * @property {string} startingWord
 */


export default class TypeWriter {
    /** @type {TypeWriterMetadata} */
    metadata;

    /**
     * @param {string} targetId
     * @param {TypeWriterMetadata} metadata
    */

    constructor(targetId = "", metadata = {}) {
        const defaultMetadata = {
            writeSpeed: 2,
            deleteSpeed: 3,
            pause: 1000,
            typeList: ["Text 1", "Text 2", "Text 3"],
            startingWord: "Typing: ",
        };

        if (metadata === undefined || metadata === null) 
            metadata = defaultMetadata;

        this.metadata = metadata;

        if (!this.metadata.typeList || this.metadata.typeList.length === 0)
            this.metadata.typeList = ["Default Text"];

        this.targetId = targetId;
        this.loopTypewriter();
    }

    loopTypewriter() {
        const element = document.getElementById(this.targetId);
        if (!element) return;
    
        const { writeSpeed, deleteSpeed, pause, typeList, startingWord } = this.metadata;
        let index = 0;
    
        const typeWriter = (text, i = 0) => {
            if (i < text.length) {
                element.placeholder = startingWord + text.substring(0, i + 1);
                setTimeout(() => typeWriter(text, i + 1), 100 / writeSpeed);
            } else {
                setTimeout(() => deleteWriter(text.length - 1), pause);
            }
        };
    
        const deleteWriter = (i) => {
            if (i >= 0) {
                element.placeholder = startingWord + typeList[index].substring(0, i);
                setTimeout(() => deleteWriter(i - 1), 100 / deleteSpeed);
            } else {
                index = (index + 1) % typeList.length;
                setTimeout(() => typeWriter(typeList[index]), 100 / writeSpeed);
            }
        };
    
        element.placeholder = startingWord;
        typeWriter(typeList[index]);
    }
}