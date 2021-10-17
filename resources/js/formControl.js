import Quill from "quill";
import 'quill/dist/quill.snow.css';

/* Quill config */
/* PSD: This is a basic configuration of quill for most information https://quilljs.com/docs/configuration/*/
var toolbarOptions = [
    [
        {
            size: ["small", false, "large", "huge"], // custom dropdown
        },
    ],
    [
        {
            header: [1, 2, 3, 4, 5, 6, false],
        },
    ],
    ['link', 'image', 'video'],
    ["bold", "italic", "underline", "strike"], // toggled buttons
    ["blockquote", "code-block"],
    [
        {
            header: 1,
        },
        {
            header: 2,
        },
    ],
    [
        {
            list: "ordered",
        },
        {
            list: "bullet",
        },
    ],
    [
        // superscript/subscript
        {
            script: "sub",
        },
        {
            script: "super",
        },
    ],
    [
        // outdent/indent
        {
            indent: "-1",
        },
        {
            indent: "+1",
        },
    ],
    [
        // text direction
        {
            direction: "rtl",
        },
    ],
    [
        // dropdown with defaults from theme
        {
            color: [],
        },
        {
            background: [],
        },
    ],
    [
        {
            font: [],
        },
    ],
    [
        {
            align: [],
        },
    ],
    ["clean"], // remove formatting button
];

/* Init Quill */
var quill = new Quill("#editor", {
    theme: "snow",
    modules: {
        toolbar: toolbarOptions,
    },
});


/* Body control */
let bodyInput = document.getElementById('body');

quill.on('text-change', () => {
  let content = quill.container.firstChild.innerHTML;
  bodyInput.value = content;
});
