// import './bootstrap';

import {Dropzone} from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Drop file here to upload",
    acceptedFiles: ".png, .jpg, .jpeg, .gif",
    addRemoveLinks: true,
    dictRemoveFile: "Remove image",
    maxFiles: 1,
    init: function() {
        if (document.getElementById('inputImage').value.trim()) {
            const imageUploaded = {};
            imageUploaded.size = 1;
            imageUploaded.name = document.getElementById('inputImage').value;
            this.options.addedfile.call(this, imageUploaded);
            this.options.thumbnail.call(this, imageUploaded, `/uploads/${document.getElementById('inputImage').value}`);
            imageUploaded.previewElement.classList.add('dz-success', 'dz-complete');
        }
    }
});

dropzone.on("success", function (file, response) {
    document.getElementById('inputImage').value = response.file;
})

dropzone.on("removedfile", function () {
    document.getElementById('inputImage').value = ''
})
