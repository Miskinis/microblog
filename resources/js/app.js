import './bootstrap';
import Editor from '@toast-ui/editor'
import '@toast-ui/editor/dist/toastui-editor.css';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const editor = new Editor({
    el: document.querySelector('#editor'),
    height: '400px',
    initialEditType: 'markdown',
    placeholder: 'Write something cool!',
    events: {
        blur: function() {
            document.querySelector('#hidden-content').value = editor.getMarkdown();
            document.querySelector('#hidden-content').dispatchEvent(new Event('input'));
        }
    }
})

// document.querySelector('#toast-editor').on('submit', e => {
//     e.preventDefault();
//     document.querySelector('#content').value = editor.getMarkdown();
//     document.querySelector('#content').dispatchEvent(new Event('input'));
// });

// document.querySelector('#toast-editor').addEventListener('submit', e => {
//     e.preventDefault();
//     document.querySelector('#hidden-content').value = editor.getMarkdown();
//     document.querySelector('#hidden-content').dispatchEvent(new Event('input'));
// });


