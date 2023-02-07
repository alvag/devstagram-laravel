// import './bootstrap';

import {Dropzone} from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Drop file here to upload",
    acceptedFiles: ".png, .jpg, .jpeg, .gif",
    addRemoveLinks: true,
    dictRemoveFile: "Remove",
    maxFiles: 1,
});

dropzone.on("sending", function (file, xhr, formData) {

});
