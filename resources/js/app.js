require('./bootstrap');
import { createApp } from 'vue/dist/vue.esm-bundler.js';
window.createApp = createApp;
window.StoryComponent = require('./components/Story.vue').default; // 👈 ここを追加しました