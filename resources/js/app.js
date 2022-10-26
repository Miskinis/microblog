import './bootstrap';
import Editor from '@toast-ui/editor'
import '@toast-ui/editor/dist/toastui-editor.css';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const toast_ui_editor_object = new Editor({
    el: document.querySelector('#editor'),
    height: '400px',
    initialEditType: 'markdown',
    placeholder: 'Write something cool!',
    events: {
        blur: function() {
            document.querySelector('#hidden-content').value = toast_ui_editor_object.getMarkdown();
            document.querySelector('#hidden-content').dispatchEvent(new Event('input'));
        }
    }
})

window.toast_ui_editor = {
    get: function () {
        return toast_ui_editor_object;
    },
    getMarkdown: function() {
        return toast_ui_editor_object.getMarkdown()
    },
    setMarkdown: function(markdown) {
        toast_ui_editor_object.setMarkdown(markdown);
    }
}


